<template>
    <div class="block-color" v-if="materials.length > 0">
        <span class="name">Матеріал</span>
        <ul class="list-color">
            <li v-for="(material, index) in materials" v-bind:key="index"
                class="text-truncate block-item-cursor" onselectstart="return false" onmousedown="return false"
                :class="{active: ariaSelected(material)}"
                v-on:click.prevent="selectMaterial(material)">{{ material }}</li>
        </ul>
        <input type="hidden" name="material" :value="selectedMaterial">
    </div>
</template>

<script>
    export default {
        props: {
            materials: {
                type: Array,
                required: false,
                default: [],
            },
        },
        data() {
            return {
                selectedMaterial: '',
            }
        },
        mounted() {
            if (this.materials.length != 0) {
                this.selectMaterial(this.materials[0]);
            }
        },
        methods: {
            ariaSelected(material) {
                if (this.selectedMaterial == material) {
                    return true;
                } else {
                    return false;
                }
            },
            selectMaterial(material) {
                this.selectedMaterial = material;
            },
        }
    }
</script>
