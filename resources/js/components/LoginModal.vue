<template>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <span class="icon-logo-modal"></span>
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Вхід</h5>
                    <h5>в особистий кабінет</h5>
                </div>
                <div class="modal-body" :novalidate="showValidation">
                    <div class="form-group row">
                        <div class=" col-sm-12">
                            <input  type="email" name="email" class="form-control" placeholder="E-mail*"
                                required minlength="3" maxlength="255"
                                :class="{ 'is-invalid' : errors.email }"
                                v-model.trim="form.email"
                                v-on:focus="clearErrors"
                                v-on:change="changeLogin()">
                            <div v-if="errors.email" class="invalid-feedback">{{ errors.email }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-sm-12">
                            <input type="password" name="password" class="form-control" placeholder="Пароль*"
                                required minlength="8" maxlength="255"
                                :class="{ 'is-invalid' : errors.password }"
                                v-model="form.password"
                                v-on:focus="clearErrors"
                                v-on:change="changePassword()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md">
                            <!--<div class="form-check terms">
                                <input type="checkbox" class="" id="terms-check" required v-model="termsCheck"
                                    :class="{ 'is-invalid' : termsValid }">
                                <label for="terms-check">
                                    <span class="d-inline-block">Я згоден на <a href="#">обробку персональних данних</a></span>
                                </label>
                                <div v-if="termsValid" class="invalid-feedback">Будь ласка погодьтеся на обробку персональних даних</div>
                            </div>-->
                        </div>
                        <div class="col-12 col-md">
                            <a href="#" class="terms" data-toggle="modal" data-target="#passwordResetSendEmailModal">Забули пароль</a>
                        </div>
                    </div>
                    <button type="button" class="btn-custom-project" :disabled="disable" v-on:click.prevent="login()">Увійти</button>
                </div>
                <div class="modal-footer">
                    <span>У вас не має облікового запису? <a href="#" data-toggle="modal" data-target="#signupModal">Реєстрація</a></span>
                </div>
            </div>
        </div>
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
        computed: {
            //отключение кнопки регистрации
            disable: function() {
                if(this.form.email && this.form.password) {
                    return false;
                } else {
                    return true;
                }
            }
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
                $('#loginModal').modal('hide');
            },
            //асинхронный логин
            login() {
                if (this.termsCheck) {
                    this.showValidation = true;
                    axios.post(window.origin+'/login-user', this.form)
                    .then((response) => {
                        if (response.data) {
                            let role = response.data.user.roles[0].slug;
                            let name = response.data.user.name;
                            let email = response.data.user.email;
                            let url = response.data.url;
                            if (name) {
                                this.getName(name);
                            };
                            if (email) {
                                this.form.email = email;
                                this.changeLogin();
                            };
                            if (url && role) {
                                this.$emit('get-url', url, role);
                            };
                            this.onLogged(true);
                            this.hideLoginModal();
                            if (role == 'dealer' || role == 'buyer') {
                                setTimeout(this.loadStore(), 1000);
                            };
                            if (role == 'superadmin' || role == 'admin' || role == 'manager') {
                                location.replace(url);
                            };
                        }
                    })
                    .catch(error => {
                        console.log('LoginModal:login');
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
            },
            loadStore() {
                axios.post(window.origin+'/cart/update', {})
                .then(response => {
                    var data = response.data;
                    this.clearStore();
                    $.each(data, (index, value) => {
                        this.$store.commit('add', value);
                    });
                    this.totalStore();
                })
                .catch(e => {
                    console.log('LoginModal:loadStore');
                    console.log(e);
                });
            },
            clearStore() {
                this.$store.commit('clear');
            },
            totalStore() {
                axios.post(window.origin+'/cart/total', {})
                .then(response => {
                    var data = response.data;
                    this.$store.commit('total', {count: data.count, cost: data.cost});
                })
                .catch(e => {
                    console.log('LoginModal:totalStore');
                    console.log(e);
                });
            }
        }
    }
</script>
