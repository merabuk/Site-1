<template>
    <div v-if="switchDisable">
        <span v-if="statusButton" class="icon icon-like-active" v-on:click="removeToFavorite"></span>
        <span v-else class="icon icon-like" v-on:click="addToFavorite"></span>
    </div>
</template>

<script>
    export default {
        props: {
            //флажок переключатель состояния гость/авторизирован
            switchDisable: {
                required: true,
            },
            productId: {
                type: Number,
                required: true,
                default: '',
            },
            status: {
                type: Boolean,
                required: true,
                default: false,
            },
        },
        data() {
            return {
                statusButton: this.status,
            }
        },
        methods: {
            addToFavorite() {
                //post
                axios.post(window.origin+'/product-favorit/add', {
                    status: false,
                    productId: this.productId,
                })
                .then(response => {
                    this.statusButton = true;
                })
                .catch(e => {
                    console.log('ButtonFavorite:addToFavorite');
                    console.log(e);
                });
            },
            removeToFavorite() {
                //post
                axios.post(window.origin+'/product-favorit/remove', {
                    status: true,
                    productId: this.productId,
                })
                .then(response => {
                    this.statusButton = false;
                    if(window.location.href == window.origin+'/product-favorit')
                    {
                        window.location.reload();
                    }
                })
                .catch(e => {
                    console.log('ButtonFavorite:removeToFavorite');
                    console.log(e);
                });
            },
        }
    }
</script>

<style>
    .icon-like-active, .icon-like {
        cursor: pointer;
    }
    .icon-like-active {
        transition: all 0.6s ease-out;
    }
</style>
