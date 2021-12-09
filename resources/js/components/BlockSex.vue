<template>
    <div class="block-color" v-if="sexs.length > 0">
        <span class="name">Стать</span>
        <ul class="list-color">
            <li v-for="(sex, index) in sexs" v-bind:key="index"
                class="text-truncate block-item-cursor" onselectstart="return false" onmousedown="return false"
                :class="{active: ariaSelected(sex)}"
                v-on:click.prevent="selectSex(sex)">{{ sex }}</li>
        </ul>
        <input type="hidden" name="sex" :value="selectedSex">
    </div>
</template>

<script>
    export default {
        props: {
            sexs: {
                type: Array,
                required: false,
                default: [],
            },
        },
        data() {
            return {
                selectedSex: '',
            }
        },
        mounted() {
            if (this.sexs.length != 0) {
                this.selectSex(this.sexs[0]);
            }
        },
        methods: {
            ariaSelected(sex) {
                if (this.selectedSex == sex) {
                    return true;
                } else {
                    return false;
                }
            },
            selectSex(sex) {
                this.selectedSex = sex;
            },
        }
    }
</script>
