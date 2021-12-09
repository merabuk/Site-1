<template>
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <span class="icon-logo-modal"></span>
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Реєстрація</h5>
                <span>У Вас вже є аккаунт? <a href="#" data-toggle="modal" data-target="#loginModal">Увійдіть.</a></span>
            </div>
            <div class="modal-body" :novalidate="showValidation">
                <div class="form-group row">
                    <div class=" col-sm-12">
                        <input type="text" name="surname" class="form-control" placeholder="Ваше прізвище*"
                            required minlength="3" maxlength="255"
                            :class="{ 'is-invalid' : errors.surname }"
                            v-model.trim="form.surname"
                            v-on:focus="clearErrors">
                        <span v-if="errors.surname" class="invalid-feedback">{{ errors.surname }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class=" col-sm-12">
                        <input type="text" name="name" class="form-control" placeholder="Ваше ім'я*"
                            required minlength="3" maxlength="255"
                            :class="{ 'is-invalid' : errors.name }"
                            v-model.trim="form.name"
                            v-on:focus="clearErrors">
                        <span v-if="errors.name" class="invalid-feedback">{{ errors.name }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class=" col-sm-12">
                        <input type="text" name="patronymic" class="form-control" placeholder="Ваше по батькові"
                            minlength="3" maxlength="255"
                            :class="{ 'is-invalid' : errors.patronymic }"
                            v-model.trim="form.patronymic"
                            v-on:focus="clearErrors">
                        <span v-if="errors.patronymic" class="invalid-feedback">{{ errors.patronymic }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class=" col-sm-12">
                        <input type="email" name="email" class="form-control" placeholder="E-mail*"
                            required minlength="3" maxlength="255"
                            :class="{ 'is-invalid' : errors.email }"
                            v-model.trim="form.email"
                            v-on:focus="clearErrors"
                            v-on:change="changeLogin">
                        <span v-if="errors.email" class="invalid-feedback">{{ errors.email }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class=" col-sm-12">
                        <masked-input type="text" name="phone" class="form-control" mask="(111) 111-11-11" placeholder="Телефон*"
                            :class="{ 'is-invalid' : errors.phone }" v-model="form.phone" ref="maskedInput" />
                        <span v-if="errors.phone" class="invalid-feedback">{{ errors.phone }}</span>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <span class="">Пароль повинен бути не коротше 8 символів</span>
                    <div class=" col-sm-12">
                        <input type="password" name="password" class="form-control" placeholder="Пароль*"
                            required minlength="8" maxlength="255"
                            :class="{ 'is-invalid' : errors.password }"
                            v-model="form.password"
                            v-on:focus="clearErrors"
                            v-on:change="changePassword">
                    </div>
                    <span v-if="errors.password" class="d-block invalid-feedback">{{ errors.password }}</span>
                </div>
                <div class="form-group row">
                    <div class=" col-sm-12">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Повторити пароль*"
                            required minlength="8" maxlength="255"
                            :class="{ 'is-invalid' : errors.password_confirmation }"
                            v-model="form.password_confirmation"
                            v-on:focus="clearErrors">
                    </div>
                    <span v-if="errors.password_confirmation" class="d-block invalid-feedback">{{ errors.password_confirmation }}</span>
                </div>
                <div class="row">
                    <div class="col-12 col-md">
                        <div class="form-check terms">
                            <input type="checkbox" id="terms-check1" required v-model="termsCheck"
                                :class="{ 'is-invalid' : termsValid }">
                            <label for="terms-check1">
                                <span class="d-inline-block">Я згоден на <a href="/terms-check" target="_blank">обробку персональних данних</a></span>
                            </label>
                            <div v-if="termsValid" class="invalid-feedback">Будь ласка погодьтеся на обробку персональних даних</div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-custom-project" :disabled="disable" v-on:click.prevent="register()">Зареєструватися</button>
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
        },
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    surname: '',
                    name: '',
                    patronymic: '',
                    phone: '',
                    password_confirmation: '',
                },
                errors: {
                    surname: '',
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                    password_confirmation: '',
                },
                showValidation: false,
                termsCheck: false,
                termsValid: false,
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
                    //событие о том что данные очищены
                    this.$emit('clear-data-success', 'Register');
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
                if(this.form.surname && this.form.name && this.form.email && this.form.password && this.form.password_confirmation) {
                    return false;
                } else {
                    return true;
                }
            },
        },
        mounted () {
            this.$refs.maskedInput.$refs.input.addEventListener('focus', this.clearErrors);
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
            //закрытие модалок
            hideRegisterModal() {
                $('#signupModal').modal('hide');
                $('#loginModal').modal('hide');
                $('#modal-sing-up-thank').modal('show');
            },
            //при фокусе на инпуте чистит ошибку
            clearErrors(event) {
                this.errors[event.target.name] = '';
            },
            //событие что зарегистрировался
            onRegistered(status) {
                // console.log('Registration modal worked!'+status);
                this.$emit('registered', status);
            },
            //асинхронная регистрация
            register() {
                if (this.termsCheck) {
                    this.showValidation = true;
                    axios.post(window.origin+'/register', this.form)
                    //если удачно
                    .then((response) => {
                        // console.log('register');
                        // console.log(response);
                        if (response.data) {
                            let role = response.data.role;
                            let name = response.data.user.name;
                            let url = response.data.url;
                            if (name) {
                                //событие получения имени
                                this.$emit('get-name', name);
                            }
                            if (url && role) {
                                //событие получения url и роли
                                this.$emit('get-url', url, role);
                            }
                            this.onRegistered(true);
                            this.hideRegisterModal();
                        }
                    })
                    //если неудачно
                    .catch(error => {
                        console.log('RegisterModal:register');
                        console.log(error);
                        if (error.response.data.errors) {
                            //получение ошибок от валидации
                            let obj = error.response.data.errors;
                            for (var prop in obj) {
                                this.errors[prop] = ''+obj[prop];
                            }
                            if (obj['password']) {
                                this.errors['password_confirmation'] = ''+obj['password'];
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
