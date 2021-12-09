<template>
    <div class="block-color" v-if="colors.length > 0">
        <span class="name">Колір</span>
        <ul class="list-color">
            <li v-for="(color, index) in colors" v-bind:key="index"
                class="text-truncate block-item-cursor" onselectstart="return false" onmousedown="return false"
                :class="{active: ariaSelected(color)}"
                v-on:click.prevent="selectColor(color)">{{ color }}</li>
        </ul>
        <input type="hidden" name="color" :value="selectedColor">
    </div>
</template>

<script>
    export default {
        props: {
            colors: {
                type: Array,
                required: false,
                default: [],
            },
        },
        data() {
            return {
                selectedColor: '',
            }
        },
        mounted() {
            if (this.colors.length != 0) {
                this.selectColor(this.colors[0]);
            }
        },
        methods: {
            ariaSelected(color) {
                if (this.selectedColor == color) {
                    return true;
                } else {
                    return false;
                }
            },
            selectColor(color) {
                this.selectedColor = color;
            },
        }
    }
</script>
