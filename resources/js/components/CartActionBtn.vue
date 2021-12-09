<template>
    <div class="product-action-wrp">
        <div class="block-add-product">
            <span class="name-line d-none d-lg-block">Кількість (шт)</span>
            <div class="add-product">
                <span class="minus" v-on:click="minusBtn" onselectstart="return false" onmousedown="return false">-</span>
                <input type="number" v-model.number="productCount" min="1" v-on:keypress="onlyNumber"
                    v-on:keyup.enter="$event.target.blur">
                <span class="plus" v-on:click="plusBtn" onselectstart="return false" onmousedown="return false">+</span>
            </div>
        </div>
        <div class="d-none d-lg-block lock-sum">
            <span class="name-line">Сума (грн.)</span>
            <div class="block-sum">
                <span class="sum">{{ productCost }}</span>
                <span> грн.</span>
            </div>
        </div>
        <span class="icon icon-delete delete-product-cart" data-toggle="modal" :data-target="modalTarget"></span>
        <!-- MODAL REMOVE PRODUCT -->
        <!-- Modal -->
        <div class="modal fade modal-custom-moto" :id="modalId" tabindex="-1" role="dialog" aria-labelledby="#modal-deleteProductLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <h5 class="title"><span>Видалити</span> товар з кошика?</h5>
                    <div class="modal-bottom btn-group">
                        <button class="btn full-color" data-dismiss="modal">Закрити</button>
                        <button class="btn" v-on:click.prevent="deleteProduct()">Видалити</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
</template>

<script>
    export default {
        props: {
            //экземпляр продукта
            product: {
                type: Object,
                required: true,
                default: {},
            },
            //атрибуты продукта
            attributes: {
                type: Object,
                required: true,
                default: {},
            },
            //индекс итерации родительского цикла
            indexP: {
                type: Number,
                required: true,
            },
            //индекс итерации вложенного цикла
            index: {
                type: Number,
                required: true,
            }
        },
        data() {
            return {
                productCount: this.attributes.count,
                productCost: this.product.actual_price_by_role,
                errors: [],
                modalId: 'removeToCartModal'+'-'+this.indexP+this.index,
                modalTarget: '#removeToCartModal'+'-'+this.indexP+this.index,
                delay: 500,
            }
        },
        mounted() {
            if ( this.productCount != 1 ) {
                //пересчитывание цены если товаров больше чем 1
                this.productCost = Math.round((this.productCount*this.product.actual_price_by_role)*100)/100;
            }
        },
        watch: {
            //если стерли значение количества товара
            productCount: function(val) {
                if (this.productCount == '') {
                    this.productCount = 1;
                };
                this.debouncedUpdateCount();
            },
        },
        computed: {
            debouncedUpdateCount() {
            // _.debounce — это функция lodash, позволяющая ограничить то,
            // насколько часто может выполняться определённая операция.
            return _.debounce(this.updateCount, this.delay);
            },
        },
        methods: {
            onlyNumber (event) {
                const keysAllowed = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                const keyPressed = event.key;
                if (!keysAllowed.includes(keyPressed)) {
                    event.preventDefault()
                };
            },
            plusBtn() {
                this.productCount++;
            },
            minusBtn() {
                if (this.productCount !== 1 && this.productCount > 1)
                {
                    this.productCount--;
                }
            },
            updateCount() {
                this.productCost = Math.round((this.productCount*this.product.actual_price_by_role)*100)/100;
                axios.post(window.origin+'/cart/update-count', {
                    product: this.product,
                    attributes: this.attributes,
                    product_count: this.productCount,
                })
                .then(response => {
                    if (response.data.result) {
                        this.loadStore();
                    };
                })
                .catch(e => {
                    console.log('CartActionBtn:updateCount');
                    console.log(e);
                });
            },
            deleteProduct() {
                axios.post(window.origin+'/cart/remove', {
                    product: this.product,
                    attributes: this.attributes,
                })
                .then(response => {
                    if (response.data.result) {
                        location.reload();
                    };
                })
                .catch(e => {
                    console.log('CartActionBtn:deleteProduct');
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
                    console.log('CartActionBtn:loadStore');
                    console.log(e);
                });
            },
            clearStore() {
                this.$store.commit('clear')
            },
            totalStore() {
                axios.post(window.origin+'/cart/total', {})
                .then(response => {
                    var data = response.data;
                    this.$store.commit('total', {count: data.count, cost: data.cost});
                })
                .catch(e => {
                    console.log('CartActionBtn:totalStore');
                    console.log(e);
                });
            }
        }
    }
</script>

<style>
    .block-add-product .minus {
        cursor: pointer;
    }
    .block-add-product .plus {
        cursor: pointer;
    }
    .product-action-wrp {
        display: contents;
    }
    .product-action-wrp .delete-product-cart {
        cursor: pointer;
    }
</style>
