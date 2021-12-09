<template>
    <div class="block-color" v-if="seasons.length > 0">
        <span class="name">Сезон</span>
        <ul class="list-color">
            <li v-for="(season, index) in seasons" v-bind:key="index"
                class="text-truncate block-item-cursor" onselectstart="return false" onmousedown="return false"
                :class="{active: ariaSelected(season)}"
                v-on:click.prevent="selectSeason(season)">{{ season }}</li>
        </ul>
        <input type="hidden" name="season" :value="selectedSeason">
    </div>
</template>

<script>
    export default {
        props: {
            seasons: {
                type: Array,
                required: false,
                default: [],
            },
        },
        data() {
            return {
                selectedSeason: '',
            }
        },
        mounted() {
            if (this.seasons.length != 0) {
                this.selectSeason(this.seasons[0]);
            }
        },
        methods: {
            ariaSelected(season) {
                if (this.selectedSeason == season) {
                    return true;
                } else {
                    return false;
                }
            },
            selectSeason(season) {
                this.selectedSeason = season;
            },
        }
    }
</script>
