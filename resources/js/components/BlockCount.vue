<template>
    <div class="add-product">
        <span class="minus" v-on:click="minus" onselectstart="return false" onmousedown="return false">-</span>
        <input type="number" name="count" v-model.number="productCount" min="1" v-on:keypress="onlyNumber"
            v-on:keyup.enter="$event.target.blur">
        <span class="plus" v-on:click="plus" onselectstart="return false" onmousedown="return false">+</span>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                productCount: 1,
            }
        },
        watch: {
            //если стерли значение количества товара
            productCount: function(val) {
                if (this.productCount == '') {
                    this.productCount = 1;
                };
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
            minus() {
                if (this.productCount !== 1 && this.productCount > 1) {
                    this.productCount--;
                };
            },
            plus() {
                this.productCount++;
            },
        }
    }
</script>

<style>
    .add-product .minus {
        cursor: pointer;
    }
    .add-product .plus {
        cursor: pointer;
    }
</style>
