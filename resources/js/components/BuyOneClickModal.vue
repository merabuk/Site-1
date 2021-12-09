<template>
    <div class="modal fade" id="buyOneClickModal" tabindex="-1" role="dialog" aria-labelledby="buyOneClickModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mt-0">
                    <span class="icon icon-hand"></span>
                    <h5 class="modal-title">Швидке замовлення</h5>
                    <p>Залиште Ваш номер телефону і ми зв'яжемося з Вами для підтвердження замовлення</p>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class=" col-sm-12">
                            <input type="text" name="name" class="form-control" placeholder="Ваше ім'я*"
                                required minlength="3" maxlength="255" v-on:focus="clearErrors"
                                v-model.trim="form.name" :class="{ 'is-invalid' : errors.name }">
                            <div v-if="errors.name" class="invalid-feedback">{{ errors.name }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-sm-12">
                            <masked-input type="text" name="phone" class="form-control" mask="(111) 111-11-11"
                                placeholder="Ваш телефон*" ref="maskedInput"
                                required v-model="form.phone" :class="{ 'is-invalid' : errors.phone }" />
                            <div v-if="errors.phone" class="invalid-feedback">{{ errors.phone }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md">
                            <span><img :src="clickCaptchaSrc"></span>
                            <button type="button" class="btn btn-danger reload"
                                v-on:click.prevent="reloadCaptcha">&#x21bb;</button>
                            <div v-if="errors.reload" class="invalid-feedback">{{ errors.reload }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md">
                            <input :id="captchaId" type="text" class="form-control" placeholder="Введіть Captcha*"
                                name="captcha" v-on:focus="clearErrors"
                                v-model.trim="form.captcha" :class="{ 'is-invalid' : errors.captcha }">
                            <div v-if="errors.captcha" class="invalid-feedback">{{ errors.captcha }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md">
                            <div class="form-check terms">
                                <input type="checkbox" id="terms-check2" required v-model="termsCheck"
                                    :class="{ 'is-invalid' : termsValid }">
                                <label for="terms-check2" class="terms-check2-sapn">
                                    <span class="d-inline-block">Я згоден на <a href="/terms-check" target="_blank">обробку персональних данних</a></span>
                                </label>
                                <div v-if="termsValid" class="invalid-feedback">Будь ласка погодьтеся на обробку персональних даних</div>
                                <div v-if="errors.load" class="invalid-feedback">Вибачте заказ не створено. Спробуйте ще раз.</div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-custom-project" :disabled="disable" v-on:click.prevent="sendToOrder()">Відправити замовлення</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            captchaSrc: {
                type: String,
                required: true,
                default: '',
            },
        },
        data() {
            return {
                form: {
                    name: '',
                    phone: '',
                    captcha: '',
                    formData: [],
                },
                errors: {
                    name: '',
                    phone: '',
                    captcha: '',
                    reload: '',
                    load: false,
                },
                showValidation: true,
                termsCheck: false,
                termsValid: false,
                clickCaptchaSrc: this.captchaSrc,
                captchaId: 'captcha-all',
            }
        },
        watch: {
            //слушатель флажка принятия условий
            termsCheck: function(val) {
                if (val) {
                    this.termsValid = false;
                }
            },
        },
        computed: {
            //отключение кнопки отправки заказа
            disable: function() {
                if(this.form.name && this.form.phone && this.form.captcha) {
                    return false;
                } else {
                    return true;
                };
            },
        },
        mounted () {
            this.$refs.maskedInput.$refs.input.addEventListener('focus', this.clearErrors);
            this.reloadCaptcha();
        },
        methods: {
            //при фокусе на инпуте чистит ошибку
            clearErrors(event) {
                this.errors[event.target.name] = '';
            },
            getFormData() {
                this.form.formData = $('#CardProductAttr').serializeArray();
            },
            //асинхронная отправки заказа
            sendToOrder() {
                if (this.termsCheck) {
                    this.showValidation = true;
                    this.errors.load = false;
                    this.getFormData();
                    axios.post(window.origin+'/orders/oneclick/product', this.form)
                    //если удачно
                    .then((response) => {
                        if (response.data.result && response.data.result == 'ok') {
                            $('#Modal-thank').show();
                            $('#Modal-thank').find('.number-order').text('№ ' + response.data.order_id);
                            $('#Modal-thank').css('opacity', 1);
                        } else {
                            this.errors.load = true;
                        };
                    })
                    //если неудачно
                    .catch(error => {
                        // console.log(error);
                        if (error.response.data.errors) {
                            //получение ошибок от валидации
                            let obj = error.response.data.errors;
                            for (var prop in obj) {
                                this.errors[prop] = ''+obj[prop];
                            }
                        }
                    });
                } else {
                    this.termsValid = true;
                }
            },
            reloadCaptcha() {
                this.errors.reload = '';
                axios.get(window.origin+'/reload-click-captcha')
                //если удачно
                .then((response) => {
                    this.clickCaptchaSrc = response.data.captcha;
                })
                //если неудачно
                .catch(error => {
                    console.log(error);
                    this.errors.reload = 'Не вдалося перезавантажити Captcha. Спробуйте ще раз.';
                });
            }
        }
    }
</script>

<style>
    .terms-check2-sapn {
        cursor: pointer;
    }
</style>
