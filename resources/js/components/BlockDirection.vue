<template>
    <div class="block-color" v-if="directions.length > 0">
        <span class="name">Напрямок</span>
        <ul class="list-color">
            <li v-for="(direction, index) in directions" v-bind:key="index"
                class="text-truncate block-item-cursor" onselectstart="return false" onmousedown="return false"
                :class="{active: ariaSelected(direction)}"
                v-on:click.prevent="selectDirection(direction)">{{ direction }}</li>
        </ul>
        <input type="hidden" name="direction" :value="selectedDirection">
    </div>
</template>

<script>
    export default {
        props: {
            directions: {
                type: Array,
                required: false,
                default: [],
            },
        },
        data() {
            return {
                selectedDirection: '',
            }
        },
        mounted() {
            if (this.directions.length != 0) {
                this.selectDirection(this.directions[0]);
            }
        },
        methods: {
            ariaSelected(direction) {
                if (this.selectedDirection == direction) {
                    return true;
                } else {
                    return false;
                }
            },
            selectDirection(direction) {
                this.selectedDirection = direction;
            },
        }
    }
</script>
