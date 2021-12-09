<template>
    <div class="w-100">
        <a href="" class="btn-buy" v-on:click.prevent="addCart">
            <span class="btn-custom-project"><span class="pb-1">{{ buttonText }}</span></span>
            <span class="icon icon-basket"></span>
        </a>
        <div class="modal modal-info-add-to-cart fade" :id="'cart-add-'+product.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Товар доданий до кошика</h5>
                    </div>
                    <div class="modal-body">
                        <div class="page-cart-ordering">
                            <div class="section-cart">
                                <div class="item-card-product">
                                    <h2 class="title-product">{{ product.name }}</h2>
                                    <span class="article">Артікул: {{ product.article}}</span>
                                    <div class="block-img">
                                        <img :src="storagePath" alt="photo-product" class="img">
                                    </div>
                                    <span v-if="actualDiscount" class="label-product sale mt-lg-2">{{ product.discount ? product.discount : '' }}% Скидка</span>
                                    <div v-if="switchPrice" class="price py-lg-2">
                                        <span class="old-price">{{ price }} грн.</span>
                                        <span class="new-price">{{ actualPrice }} грн.</span>
                                    </div>
                                    <div v-else class="price py-lg-2">
                                        <span class="new-price">{{ actualPrice }} грн.</span>
                                    </div>
                                    <div class="block-add-product py-lg-2">
                                        <div class="add-product">
                                            <span class="minus" v-on:click="minusBtn" onselectstart="return false"
                                                onmousedown="return false">-</span>
                                            <input type="number" v-model.number="productCount" min="1" v-on:keypress="onlyNumber"
                                                v-on:keyup.enter="$event.target.blur">
                                            <span class="plus" v-on:click="plusBtn" onselectstart="return false"
                                                onmousedown="return false">+</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-btn">
                                    <ul class="d-md-flex">
                                        <li><a href="" class="btn-custom-project btn-to-catalog" data-dismiss="modal">Продовжити купувати</a></li>
                                        <li><a :href="pathToCart" class="btn-custom-project" style="width: 100%">Перейти до кошика</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-info-client" :id="'Modal-warning-'+product.id" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-top">
                        <h5 class="title">Увага!</h5>
                    </div>
                    <div class="modal-body">
                        <span class="text-thank">Будь ласка оберіть розмір товару</span>
                        <!--<span class="text-thank">У товару є обовєязкові характеристики. Будь ласка перейдіть та оберіть всі характеристики товару </span>
                        <span class="text-small">(розмір, колір, матеріал тощо)</span>-->
                    </div>
                    <div class="modal-bottom">
                        <button class="btn"  aria-label="Close" data-dismiss="modal"
                            :data-target="'#Modal-warning-'+product.id" v-on:click="goToProduct">Перейти</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            product: {
                type: Object,
                required: true,
                default: {},
            },
            formCheck: {
            	type: Boolean,
            	required: false,
            	default: false,
            },
            price: {
                // type: Number,
                required: true,
                default: 0,
            },
            actualPrice: {
                // type: Number,
                required: true,
                default: 0,
            },
            actualDiscount: {
                type: Boolean,
                required: true,
            },
        },
        data() {
            return {
                storage: window.origin+'/storage/',
                noImage: window.origin+'/images/backend/no-image.png',
                formData: [],
                productCount: 1,
                errors: [],
                pathToCart: window.origin+'/cart',
                delay: 500,
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
            buttonText: function() {
                var text = 'В кошик';
                var products = this.$store.state.cart;
                if (products.length > 0) {
                    $.each(products, (index, value) => {
                        if (value['product'].id == this.product.id) {
                            text = 'У кошику';
                        };
                    });
                };
                return text;
            },
            storagePath: function() {
                if (typeof(this.product.main_image) != 'undefined' && this.product.main_image !== null && this.product.main_image.length > 0) {
                    return this.storage + this.product.main_image[0].path;
                } else if (typeof(this.product.images) != 'undefined' && this.product.images !== null && this.product.images.length > 0) {
                    return this.storage + this.product.images[0].path;
                } else {
                    return this.noImage;
                }
            },
            switchPrice: function() {
                if (this.actualPrice != this.price) {
                    return true;
                } else {
                    return false;
                };
            }
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
                axios.post(window.origin+'/cart/update-count', {
                    product: this.product,
                    attributes: this.formData,
                    product_count: this.productCount,
                    serialize: true,
                })
                .then(response => {
                    if (response.data.result) {
                        $.each(this.formData, (index, value) => {
                            if (value['name'] == 'count') {
                                this.formData[index]['value'] = this.productCount;
                            };
                        });
                        this.loadStore();
                    };
                })
                .catch(e => {
                    console.log('ButtonAddCart:updateCount');
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
                    console.log('ButtonAddCart:loadStore');
                    console.log(e);
                });
            },
        	getFormData() {
        	    this.formData =	$('#CardProductAttr').serializeArray();
        	},
            goToProduct() {
                location.replace(window.origin+'/product/'+this.product.id);
            },
            addCart() {
                //если на странице товара (там где форма)
                if (this.formCheck === true) {
                    this.getFormData();
                } else {
                    this.formData = [];
                    let sizeMultiple = false;
                    //если у товара по одному атрибуту
                    const attr = ['size', 'color', 'material', 'direction', 'sex', 'season'];
                    $.each(attr, (index, value) => {
                        if (this.product[value].length != 0  && this.product[value].length == 1) {
                            //если атрибут товара имеет один вариант
                            this.formData.push({name: value, value: this.product[value][0]});
                        }else if (this.product[value].length > 1) {
                            //если атрибут товара имеет несколько вариантов
                            if (value == attr[0]) {
                                //если несколько размеров
                                sizeMultiple = true;
                            } else {
                                //если несколько других атрибутов кроме размеров то выбираем первое
                                this.formData.push({name: value, value: this.product[value][0]});
                            };
                        };
                    });
                    if (this.formData.length == 0 || sizeMultiple) {
                        $('#Modal-warning-'+this.product.id).modal('show');
                        return false;
                    }else {
                        this.formData.push({name: 'product_id', value: this.product.id});
                        this.formData.push({name: 'count', value: 1});
                    };
                };
                //проверка на выбор атрибутов
                if (this.formData.length != 0) {
                    var allSelect = false;
                    $.each(this.formData, (index, value) => {
                        if (value['value'] == '') {
                            allSelect = true;
                            $('#Modal-warning').modal('show');
                            return false;
                        };
                    });
                    if (allSelect) {
                        return false;
                    } else {
                        //post
                        axios.post(window.origin+'/cart/add', {
                            productId: this.product.id,
                            productAttr: this.formData,
                        })
                        .then(response => {
                            if (response.data.count && response.data.count != 1) {
                                this.productCount = response.data.count;
                            } else {
                                this.productCount = 1;
                            };
                            if (response.data.cart != null) {
                                var data = response.data.cart;
                                $('#cart-add-'+this.product.id).modal('show');
                                this.clearStore();
                                $.each(data, (index, value) => {
                                    this.updateStore(value);
                                });
                                this.totalStore();
                            } else {
                                window.location.reload();
                            };
                        })
                        .catch(e => {
                            console.log('ButtonAddCart:addCart');
                            console.log(e);
                        });
                    };
                } else {
                    return false;
                };
            },
            updateStore(item) {
                this.$store.commit('add', item);
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
                    console.log('ButtonAddCart:totalStore');
                    console.log(e);
                });
            }
        }
    }
</script>
