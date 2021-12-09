<template>
    <li class="block-mini-cart" id="block-mini-cart" :class="{'d-none': onCartPage}">
        <a href="#">
            <i class="icon icon-basket"></i>
            <span class="number-product-in-cart">{{ $store.state.allCartCount }}</span>
        </a>
        <div class="mini-cart">
            <div class="">
                <ul class="cart-list">
                    <li v-for="(item, index) in cart" class="item-product-in-cart" v-bind:key="index">
                        <div class="block-img">
                            <img :src="(item['product'].main_image.length > 0)
                                    ? '/storage/'+item['product'].main_image['0'].path
                                    : '/images/backend/no-image.png'"
                                alt="photo-product" class="img">
                        </div>
                        <div class="info-product">
                            <a :href="'/product/'+item['product'].id" class="title-product">{{ item['product'].name }}</a>
                            <span class="new-price">{{ item['product'].actual_price_by_role }} грн.</span>
                        </div>
                        <span class="icon-close cart-delete-item" v-on:click.prevent="showModal(index)"></span>

                        <div class="modal fade modal-custom-moto" :id="'removeModuleHomeCart'+index" tabindex="-1"
                            role="dialog" :aria-labelledby="'#removeModuleHomeCart'+index" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <h5 class="title"><span>Видалити</span> товар з кошика?</h5>
                                    <div class="modal-bottom btn-group">
                                        <button class="btn full-color" data-dismiss="modal">Закрити</button>
                                        <button class="btn" v-on:click.prevent="removeCart(item, index)">Видалити</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                </ul>
                <div class="total-info">
                    <div class="block-number">
                        <span>Загалом товарів : </span>
                        <span class="number">  {{ $store.state.allCartCount }}</span>
                    </div>
                    <div class="block-sum">
                        <span> Сума: </span>
                        <div>
                            <span class="sum">{{ $store.state.allCost }}</span>
                            <span> грн.</span>
                        </div>
                    </div>
                </div>
                <a :href="cartRouteData" class="btn-custom-project">Перейти до кошика</a>
            </div>
        </div>
    </li>
</template>

<script>
    export default {
        props: {
            cartRoute: {
                type: String,
                required: false,
                default: '/cart',
            },
            onCartPage: {
                type: Boolean,
                required: true,
                default: false,
            },
        },
        data() {
            return {
                cartRouteData: this.cartRoute,
                errors: [],
            }
        },
        mounted() {
            this.loadStore();
        },
        computed: {
            cart: function() {
                var cart_view = [];
                var cart_store = this.$store.state.cart;
                $.each(cart_store, (index, cart_item) => {
                    $.each(cart_item['attributes'], (index, item) => {
                        let arr_item = {
                            'attributes': item,
                            'product': cart_item['product'],
                        };
                        cart_view.push(arr_item);
                    });
                });
                return cart_view;
            }
        },
        methods: {
            showModal(index) {
                $(".block-mini-cart .mini-cart" ).hide();
                $('#removeModuleHomeCart'+index).modal('show');
            },
            removeCart(item, index) {
                axios.post(window.origin+'/cart/remove', {
                    product: item['product'],
                    attributes: item['attributes'],
                })
                .then(response => {
                    if (response.data.result) {
                        this.loadStore();
                        $('#removeModuleHomeCart'+index).modal('hide');
                    };
                })
                .catch(e => {
                    console.log('CartModuleHome:removeCart');
                    console.log(e);
                });
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
                    console.log('CartModuleHome:loadStore');
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
                    console.log('CartModuleHome:totalStore');
                    console.log(e);
                });
            }
        }
    }
</script>
<style>
    .cart-delete-item {
        cursor: pointer;
    }
    .modal-backdrop {
        position: relative;
    }
    .cart-list {
        max-height: 455px;
        overflow-y: auto;
        padding-right: 16px;
    }
</style>
