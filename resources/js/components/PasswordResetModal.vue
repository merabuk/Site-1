<template>
    <div class="modal fade" id="passwordResetModal" tabindex="-1" role="dialog" aria-labelledby="passwordResetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <span class="icon-logo-modal"></span>
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordResetModalLabel">Відновлення пароля</h5>
                </div>
                <div class="modal-body" :novalidate="showValidation">
                    <div class="form-group row">
                        <div class=" col-sm-12">
                            <input type="email" name="email" class="form-control" placeholder="E-mail*"
                                required minlength="3" maxlength="255"
                                :class="{ 'is-invalid' : errors.email }"
                                v-model.trim="form.email"
                                v-on:focus="clearErrors">
                            <span v-if="errors.email" class="invalid-feedback">{{ errors.email }}</span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <span class="">Пароль повинен бути не коротше 8 символів</span>
                        <div class=" col-sm-12">
                            <input type="password" name="password" class="form-control" placeholder="Пароль*"
                                required minlength="8" maxlength="255"
                                :class="{ 'is-invalid' : errors.password }"
                                v-model="form.password"
                                v-on:focus="clearErrors">
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
                    <div v-if="message" class="feedback">{{ message }}</div>
                    <button type="button" class="btn-custom-project" :disabled="disable" v-on:click.prevent="passwordReset()">Відновлення пароля</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            //вх. парам. email
            requestEmail: {
                type: String,
                required: true,
            },
            //вх. парам. token
            requestToken: {
                type: String,
                required: true,
            },
        },
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                errors: {
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                message: '',
                showValidation: false,
            }
        },
        mounted () {
            //когда смонтирован присваивает логин если есть вызывает событие
            if (this.requestEmail && this.requestToken){
                this.form.email = this.requestEmail;
                this.showPasswordResetModal();
            }
        },
        computed: {
            //отключение кнопки регистрации
            disable: function() {
                if(this.form.email && this.form.password && this.form.password_confirmation) {
                    return false;
                } else {
                    return true;
                }
            }
        },
        methods: {
            //при фокусе на инпуте чистит ошибку и сообщение
            clearErrors(event) {
                this.errors[event.target.name] = '';
                if (this.message) {
                    this.message = '';
                }
            },
            //открытие модалки
            showPasswordResetModal() {
                $('#passwordResetModal').modal('show');
            },
            //асинхронный запрос на смену пароля
            passwordReset() {
                this.showValidation = true;
                axios.post(window.origin+'/password/reset', {
                    email: this.form.email,
                    password: this.form.password,
                    password_confirmation: this.form.password_confirmation,
                    token: this.requestToken,
                    headers: {
                        Accept: 'application/json',
                    },
                })
                .then((response) => {
                    // console.log(response);
                    if (response.data.message) {
                        this.message = response.data.message;
                    }
                    setTimeout(() => location.replace(window.origin), 1000);
                })
                .catch(error => {
                    console.log(error);
                    if (error.response.data.message) {
                        this.message = error.response.data.message;
                    }
                    if (error.response.data.errors) {
                        let obj = error.response.data.errors;
                        for (var prop in obj) {
                            this.errors[prop] = ''+obj[prop];
                        }
                        if (obj['password']) {
                                this.errors['password_confirmation'] = ''+obj['password'];
                        }
                    }
                });
            }
        }
    }
</script>
