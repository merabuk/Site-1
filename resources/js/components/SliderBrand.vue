<template>
    <section class="section-slider-brand">
        <div class="container">
            <ul class="slider-brand">
                <li v-for="brand in brands" v-bind:key="brand.id" class="slider-brand-item">
                    <a :href="brandRoute+'?brand='+brand.slug" class="slider-link" style="width: 100%; display: inline-block;">
                        <img :src="brand.main_image[0] ? storage+brand.main_image[0].path : noImage"
                            alt="photo-product" class="imgimg-fluid img-brand-slider" :name="brand.slug"
                            :class="{ 'filtered-img': requestQuery(brand.slug) }" style="margin: auto;">
                    </a>
                </li>
            </ul>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            //вх. парам. колекция с брендами
            brands: {
                type: Array,
                required: true,
            },
            //вх. парам. роут брендов
            brandRoute: {
                type: String,
                required: false,
                default: '/brands',
            },
            //вх. парам. выбранного бренда
            brandSlug: {
                type: String,
                required: false,
                default: '',
            },
        },
        data() {
            return {
                storage: window.origin+'/storage/',
                noImage: window.origin+'/images/backend/no-image.png',
            }
        },
        methods: {
            requestQuery(slug) {
                if(this.brandSlug) {
                    if (this.brandSlug == slug) {
                        return false;
                    } else {
                        return true;
                    };
                } else {
                    return true;
                };
            },
        }
    }
</script>
