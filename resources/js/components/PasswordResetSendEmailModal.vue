<template>
    <div class="modal fade" id="passwordResetSendEmailModal" tabindex="-1" role="dialog" aria-labelledby="passwordResetSendEmailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <span class="icon-logo-modal"></span>
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordResetSendEmailModalLabel">Відновлення пароля</h5>
                </div>
                <div class="modal-body" :novalidate="showValidation">
                    <div class="form-group row">
                        <div class=" col-sm-12">
                            <input  type="email" name="email" class="form-control" placeholder="E-mail*"
                                required minlength="3" maxlength="255"
                                v-model.trim="form.email"
                                v-on:focus="clearMessage()">
                        </div>
                    </div>
                    <div v-if="message" class="feedback">{{ message }}</div>
                    <button type="button" class="btn-custom-project" :disabled="disable" v-on:click.prevent="passwordReset()">Відправити посилання для відновлення пароля</button>
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
        },
        data() {
            return {
                form: {
                    email: '',
                },
                message: '',
                showValidation: false,
            }
        },
        watch: {
            //слушатель изменения вх. парам. логина
            typeEmail: function(val) {
                this.form.email = val;
            },
        },
        computed: {
            //отключение кнопки регистрации
            disable: function() {
                if(this.form.email) {
                    return false;
                } else {
                    return true;
                }
            }
        },
        methods: {
            //при фокусе на инпуте чистит сообщение
            clearMessage() {
                this.message = '';
            },
            //асинхронная отправка письма
            passwordReset() {
                this.showValidation = true;
                axios.post(window.origin+'/password/email', {
                    email: this.form.email,
                })
                .then((response) => {
                    // console.log(response);
                    if (response.data.message) {
                        this.message = response.data.message;
                    }
                })
                .catch(error => {
                    console.log(error);
                    if (error.response.data.message) {
                        this.message = error.response.data.message;
                    }
                });
            }
        }
    }
</script>
