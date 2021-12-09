<template>
    <div class="block-size" v-if="inSizes.length > 0">
        <div class="d-flex"><span class="name">Розмір</span><!--<a href="#" class="info-size">Таблиця розмірів</a>--></div>
        <ul class="list-size">
            <!--<li class="not-stock">48</li>-->
            <li v-for="(size, index) in inSizes" v-bind:key="index"
                class="text-truncate block-item-cursor" onselectstart="return false" onmousedown="return false"
                :class="ariaSelected(size) ? 'active' : 'in-stock'"
                v-on:click.prevent="selectSize(size)">{{ size }}</li>
        </ul>
        <input type="hidden" name="size" :value="selectedSize">
    </div>
</template>

<script>
    export default {
        props: {
            sizes: {
                type: Array,
                required: false,
                default: [],
            },
        },
        data() {
            return {
                inSizes: [],
                selectedSize: '',
            }
        },
        mounted () {
            //когда смонтирован вызывает сортировку входящего массива
            if (this.sizes.length > 0){
                this.inSizes = this.sizes.sort(this.compareNumbers);
            }
        },
        methods: {
            //для функции сортировки
            compareNumbers(a, b) {
                return a - b;
            },
            ariaSelected(size) {
                if (this.selectedSize == size) {
                    return true;
                } else {
                    return false;
                }
            },
            selectSize(size) {
                this.selectedSize = size;
            },
        }
    }
</script>
