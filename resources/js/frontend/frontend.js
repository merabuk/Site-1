/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Подключение карусели
require('slick-carousel');
import Vue from 'vue';
// FontAwesome JS
/* require('@fortawesome/fontawesome-free/js/all'); */
import Vuex from 'vuex';

import MaskedInput from 'vue-masked-input';

window.Vue = require('vue').default;
window.Vuex = Vuex;

import store from './store.js';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('../components/ExampleComponent.vue').default);
Vue.component('masked-input', MaskedInput);

Vue.component('login-modal', require('../components/LoginModal.vue').default);
Vue.component('register-modal', require('../components/RegisterModal.vue').default);
// Vue.component('sign-in-sign-up-li', require('../components/SignInSignUpLi.vue').default);
// Vue.component('sign-in-sign-up-li-mobile', require('../components/SignInSignUpLiMobile.vue').default);
Vue.component('sign-in-sign-up-li', () => import('../components/SignInSignUpLi.vue'));
Vue.component('sign-in-sign-up-li-mobile', () => import('../components/SignInSignUpLiMobile.vue'));
Vue.component('product-brand', require('../components/ProductBrand.vue').default);
Vue.component('video-player', require('../components/VideoPlayer.vue').default);
// Vue.component('countdown-timer', require('../components/CountdownTimer.vue').default);
Vue.component('button-favorite', require('../components/ButtonFavorite.vue').default);
Vue.component('buy-one-click-modal', require('../components/BuyOneClickModal.vue').default);
Vue.component('buy-one-click-cart-modal', require('../components/BuyOneClickCartModal.vue').default);
Vue.component('buy-one-click-preview-modal', require('../components/BuyOneClickPreviewModal.vue').default);
Vue.component('block-size', require('../components/BlockSize.vue').default);
Vue.component('block-color', require('../components/BlockColor.vue').default);
Vue.component('block-material', require('../components/BlockMaterial.vue').default);
Vue.component('button-add-cart', require('../components/ButtonAddCart.vue').default);
Vue.component('cart-action-btn', require('../components/CartActionBtn.vue').default);
// Vue.component('cart-module-home', require('../components/CartModuleHome.vue').default);
Vue.component('cart-module-home', () => import('../components/CartModuleHome.vue'));
Vue.component('block-direction', require('../components/BlockDirection.vue').default);
Vue.component('block-sex', require('../components/BlockSex.vue').default);
Vue.component('block-season', require('../components/BlockSeason.vue').default);
Vue.component('block-count', require('../components/BlockCount.vue').default);
Vue.component('favorite-li', require('../components/FavoriteLi.vue').default);
Vue.component('favorite-li-mobile', require('../components/FavoriteLiMobile.vue').default);
Vue.component('cart-status', require('../components/CartStatus.vue').default);
Vue.component('live-search', require('../components/LiveSearch.vue').default);
Vue.component('cart-total-order', require('../components/CartTotalOrder.vue').default);
Vue.component('password-reset-send-email-modal', require('../components/PasswordResetSendEmailModal.vue').default);
Vue.component('password-reset-modal', require('../components/PasswordResetModal.vue').default);
Vue.component('order-login', require('../components/OrderLogin.vue').default);
Vue.component('order-done-modal', require('../components/OrderDoneModal.vue').default);
Vue.component('order-password-register', require('../components/OrderPasswordRegister.vue').default);
Vue.component('modal-sing-up-thank', require('../components/ModalSingUpThank.vue').default);
Vue.component('slider-brand', require('../components/SliderBrand.vue').default);
Vue.component('like-non-click', require('../components/LikeNonClick.vue').default);
Vue.component('activate-buy-one-click-modal', require('../components/ActivateBuyOneClickModal.vue').default);
Vue.component('logout-li-mobile', require('../components/LogoutLiMobile.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
    data() {
        return{
            config: {},
            form: {
                email: '',
                password: '',
            },
            clearDataLoginStatus: false,
            clearDataRegisterStatus: false,
            switchDisable: false,
            userName: 'Покупець',
            url: '',
            textForUrl: '',
            brandSlug: '',
        }
    },
    mounted () {
        this.getUserName();
     },
    methods: {
        //обработчик события смены логина
        changeLogin(data) {
            this.form.email = data;
        },
        //обработчик события смены пароля
        changePassword(data) {
            this.form.password = data;
        },
        //обработчик события смены имени пользователя
        getName(name) {
            this.userName = name;
        },
        //обработчик события логина/регистрации
        turnOn(status) {
            this.changeSwitchDisable(status);
            this.clearData();
        },
        //обработчик события логаута
        logout(status) {
            this.changeSwitchDisable(status);
        },
        //обработчик события очистки дочерних компонентов логина/регистрации
        setDataStatusFalse(modal) {
            if (modal == 'Register') {
                this.clearDataRegisterStatus = false;
            }
            if (modal == 'Login') {
                this.clearDataLoginStatus = false;
            }
        },
        //очистка данных
        clearData() {
            this.clearDataObject(this.form);
            this.clearDataLoginStatus = true;
            this.clearDataRegisterStatus = true;
            this.getUserName();
        },
        //универсальный метод очищения массива/объекта
        clearDataObject(obj) {
            for (var prop in obj) {
                obj[prop] = '';
            }
        },
        //сопоставление описания для url в меню от роли пользователя
        getUrlbyRole(url, role) {
            this.url = url;
            switch (role) {
                case 'superadmin':
                case 'admin':
                case 'manager':
                    this.textForUrl = 'Панель керування';
                    break;
                case 'dealer':
                    this.textForUrl = 'Профіль';
                    break;
                case 'buyer':
                    this.textForUrl = 'Мій профіль';
                    break;
                default:
                    break;
            }
        },
        //переключатель для флага гость/авторизирован
        changeSwitchDisable(status) {
            this.switchDisable = status;
        },
        //асинхронный запрос к серверу за необходимыми данными при перегрузке страницы
        getUserName() {
            if (window.laravel.api_token) {
                this.config = {
                    headers: {
                        Authorization: 'Bearer ' + window.laravel.api_token,
                        Accept: 'application/json',
                    },
                };
                axios.get(window.origin+'/api/check-user', this.config)
                .then((response) => {
                    // console.log('main');
                    // console.log(response);
                    if (response.data) {
                        let role = response.data.user.roles[0].slug;
                        let name = response.data.user.name;
                        let email = response.data.user.email;
                        let url = response.data.url;
                        if (name) {
                            // console.log(name);
                            this.userName = name;
                        } else {
                            this.userName = 'Покупець';
                        }
                        if (response.data.switchDisable) {
                            this.switchDisable = true;
                        } else {
                            this.switchDisable = false;
                        }
                        if (email) {
                            // console.log(email);
                            this.form.email = email;
                        }
                        if (url && role) {
                            // console.log(url);
                            // console.log(role);
                            this.getUrlbyRole(url, role);
                        }
                    }
                })
                .catch(error => {
                    console.log(error);
                });
            }
        },
        //обработчик события смены бренда
        changeBrand(slug) {
            this.brandSlug = slug;
        },
    }
});
