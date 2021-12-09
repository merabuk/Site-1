<template>
    <div class="search-form">
        <div class="input-group">
            <input type="search" class="form-control" v-model="question" @click="refind" @focus="openAnswer" @blur="closeAnswer" v-on:keyup.enter="openFindPage"
                placeholder="Пошук" aria-label="Пошук" aria-describedby="basic-addon2" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn-outline- btn-live-search" type="button" @click.prevent="openFindPage">
                    <i class="icon icon-search"></i>
                </button>
                <div class="search-panel" v-if="enable && typeof(answer) == 'string'">
                    {{ answer }}
                </div>
                <div class="search-panel block-item-cursor" v-if="enable && typeof(answer) == 'object'">
                    <div class="row search-item" v-for="product in answer" v-bind:key="product.id" @click="toProduct(product.id)">
                        <div class="col-2">
                            <img v-if="product.main_image[0]" :src="storage+product.main_image[0].path" class="img-fluid">
                        </div>
                        <div class="col-10">
                            {{ product.name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                enable: false,
                question: null,
                answer: 'Введіть запит...',
                delay: 500,
                config: {
                    headers: {
                        Authorization: 'Bearer ' + window.laravel.api_token,
                        Accept: 'application/json',
                    },
                    params: {
                        question: null,
                    }
                },
                storage: window.origin+'/storage/',
                product_path: window.origin+'/product/',
            }
        },
        watch: {
                // эта функция запускается при любом изменении вопроса
                question() {
                this.answer = 'Чекаю, доки Ви завершите друкувати запит...';
                if (this.question !== '') {
                    this.config.params.question = this.question;
                    this.debouncedGetAnswer();
                }
            },
        },
        computed: {
            debouncedGetAnswer() {
            // _.debounce — это функция lodash, позволяющая ограничить то,
            // насколько часто может выполняться определённая операция.
            return _.debounce(this.getAnswer, this.delay);
            },
        },
        methods: {
            getAnswer() {
                this.answer = 'Опрацювання запиту...';
                axios.get(window.origin+'/api/search', this.config)
                    .then((response) => {
                        this.answer = response.data;
                    })
                    .catch((error) => {
                        this.answer = 'Помилка...';
                    });
            },
            closeAnswer() {
                setTimeout(() => {
                    this.answer = '';
                    this.enable = false;
                }, 200);
            },
            openAnswer() {
                if (!this.question) {
                    this.answer = 'Введіть запит...';
                } else {
                    this.answer = 'Опрацювання запиту...';
                }
                this.enable = true;
            },
            // эта функция запускается при любом изменении вопроса
            refind() {
                if (this.question) {
                    this.config.params.question = this.question;
                    this.debouncedGetAnswer();
                }
            },
            // открытие страницы с результатами поиска
            openFindPage() {
                if (this.question) {
                    window.location.href = window.origin+'/search?question='+this.question;
                }
            },
            // открыть страницу с товаром выбранную пользователем из выпадающего меню ЛайвСерча
            toProduct(productId){
                window.location.href = this.product_path+productId;
            }
        },
    }
</script>

<style>
    .search-panel {
        position: absolute;
        left: 0;
        top: 37px;
        background: #ffffff;
        width: 100%;
        padding: 5px;
        z-index: 1000;
        color: #000000;
    }
    .search-item:hover{
        background-color: #FF8200;
        color: #ffffff;
        margin-left: 0px;
        margin-right: 0px;
    }
    .btn-live-search{
        background: #FF8200 !important;
    }
</style>
