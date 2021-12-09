<template>
    <div class="tab-pane fade" id="old-user" role="tabpanel" aria-labelledby="old-user">
        <form class="form-personal-info">
            <div class="form-group row">
                <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">E-mail</label>
                <div class=" col-sm-7  col-md-8 col-lg-6">
                    <!--                                <span class=" icon-error"></span>-->
                    <input type="email" name="email" class="form-control" placeholder="mail@gmail.com" 
                        required minlength="3" maxlength="255"
                                :class="{ 'is-invalid' : errors.email }"
                                v-model.trim="form.email"
                                v-on:focus="clearErrors"
                                v-on:change="changeLogin()">
                </div>
                <!--                            <span class="text-error col-">Невірний E-mail</span>-->
            </div>
            <div class="form-group row">
                <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Пароль</label>
                <div class="col-sm-7  col-md-8 col-lg-6">
                    <input type="password" name="password" class="form-control"  placeholder="Пароль*"
                         required minlength="8" maxlength="255"
                                :class="{ 'is-invalid' : errors.password }"
                                v-model="form.password"
                                v-on:focus="clearErrors"
                                v-on:change="changePassword()">
                </div>
            </div>
            <div class="offset-md-4 offset-lg-3 col-sm-7  col-md-8 col-lg-6">
                <!-- <div class="">
                    <div class="form-check terms">
                        <input type="checkbox" class="" id="terms-check-1">
                        <label for="terms-check-1" class="py-1 ">
                            <span class="d-inline-block">Я згоден на <a href="#">обробку персональних данних</a></span>
                        </label>
                    </div>
                </div> -->
                <div class="col-12">
                    <a href="#" class="forgot-password text-md-left" data-toggle="modal" data-target="#passwordResetSendEmailModal">Забули пароль ?</a>
                </div>
            </div>
            <div class="offset-md-4 offset-lg-3 col-sm-7  col-md-8 col-lg-6">
                <button type="button" class="ml-md-0 btn-custom-project" v-on:click.prevent="login()">Увійти</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: {
            //вх. парам. логин
            typeEmail: {
                type: String,
                required: false,
                default: '',
            },
            //вх. парам. пароль
            typePassword: {
                type: String,
                required: false,
                default: '',
            },
            //флажок надобности очистки данных
            clearData: {
                type: Boolean,
                required: true,
            },
            //старый пароль из сессии
            oldEmail: {
                type: String,
                required: false,
                default: '',
            },
        },
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                },
                errors: {
                    email: '',
                    password: '',
                },
                showValidation: false,
                termsCheck: true,
                termsValid: false,
            }
        },
        mounted () {
            //когда смонтирован присваивает логин если есть вызывает событие
            if (this.oldEmail != '' && this.form.email == ''){
                this.form.email = this.oldEmail;
                this.changeLogin();
            }
        },
        watch: {
            //слушатель изменения вх. парам. логина
            typeEmail: function(val) {
                this.form.email = val;
            },
            //слушатель изменения вх. парам. пароля
            typePassword: function(val) {
                this.form.password = val;
            },
            //слушатель надобности очистки данных
            clearData: function(status) {
                if (status) {
                    this.clearDataObject(this.form);
                    this.clearDataObject(this.errors);
                    this.showValidation = false;
                    this.termsCheck = false;
                    this.$emit('clear-data-success', 'Login');
                    this.form.email = this.typeEmail;
                }
            },
            //слушатель флажка принятия условий
            termsCheck: function(val) {
                if (val) {
                    this.termsValid = false;
                }
            },
        },
         methods: {
            //универсальный метод очищения массива/объекта
            clearDataObject(obj) {
                for (var prop in obj) {
                    obj[prop] = '';
                }
            },
            //событие при смене логина
            changeLogin() {
                this.$emit('change-login', this.form.email);
            },
            //событие при смене пароля
            changePassword() {
                this.$emit('change-password', this.form.password);
            },
            //при фокусе на инпуте чистит ошибку
            clearErrors(event) {
                this.errors[event.target.name] = '';
            },
            //событие что залогинился
            onLogged(status) {
                this.$emit('logged', status);
            },
            //событие получения имени
            getName(name) {
                this.$emit('get-name', name);
            },
            //закрытие модалки
            hideLoginModal() {
                window.location.reload();
            },
            //асинхронный логин
            login() {
                if (this.termsCheck) {
                    this.showValidation = true;
                    axios.post(window.origin+'/login', this.form)
                    .then((response) => {
                        // console.log('login');
                        // console.log(response);
                        if (response.data) {
                            let role = response.data.user.roles[0].slug;
                            let name = response.data.user.name;
                            let email = response.data.user.email;
                            let url = response.data.url;
                            if (name) {
                                this.getName(name);
                            }
                            if (email) {
                                this.form.email = email;
                                this.changeLogin();
                            }
                            if (url && role) {
                                this.$emit('get-url', url, role);
                            }
                            this.onLogged(true);
                            this.hideLoginModal();
                            if (role == 'superadmin' || role == 'admin' || role == 'manager') {
                                // console.log('in admin');
                                location.replace(url);
                            }
                        }
                    })
                    .catch(error => {
                        console.log(error);
                        if (error.response.data.errors) {
                            let obj = error.response.data.errors;
                            for (var prop in obj) {
                                this.errors[prop] = ''+obj[prop];
                            }
                            if (obj['email']) {
                                this.errors['password'] = ''+obj['email'];
                            }
                        }
                    });
                } else {
                    this.termsValid = true;
                }
            }
        }
    }
</script>
