<template>
    <div class="brand-wrapper">
        <div class="pills-wrapper">
            <ul class="nav nav-pills" id="myTab" role="tablist">
                <li class="nav-item" v-for="brand in brands" v-bind:key="brand.id">
                    <a class="nav-link" :class="{active: ariaSelected(brand.slug)}" :id="brand.slug+'-tab'" data-toggle="tab"
                        :href="'#'+brand.slug" role="tab" :aria-controls="brand.slug" :aria-selected="ariaSelected(brand.slug)"
                        v-on:click="brandSelected" :name="brand.slug">
                        <img :src="brand.main_image[0] ? storage+brand.main_image[0].path : noImage"
                            alt="photo-product" class="img" :name="brand.slug">
                        <img :src="brand.main_image[0] ? storage+brand.main_image[0].path : noImage"
                            alt="photo-product" class="img img-orange" :name="brand.slug">
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" :id="slug" role="tabpanel" aria-labelledby="alpinestars-tab">
                <h3 class="title-section my-lg-3 text-wrap">{{ curent.title }}</h3>
                <div v-html="curent.details"></div>
                <div class="info-brand-tab">
                    <div class="d-xl-flex align-items-center">
                        <h2 class="title-section">Додаткова інформація:</h2>
                        <ul class="nav nav-tabs ml-lg-4" id="myTab-info-brand" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="video-brand-tab" data-toggle="tab" href="#video-brand" role="tab" aria-controls="video-brand" aria-selected="true">Відео</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="photo-brand-tab" data-toggle="tab" href="#photo-brand" role="tab" aria-controls="photo-brand" aria-selected="false">Фотогалерея</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent-info-brand">
                        <div class="tab-pane fade show active" id="video-brand" role="tabpanel" aria-labelledby="video-brand-tab">
                            <video-player :videos="videoList" viewWidth="730px"></video-player>
                        </div>
                        <div class="tab-pane fade" id="photo-brand" role="tabpanel" aria-labelledby="photo-brand-tab">
                            <ul class="slider-photo-brand" v-if="galeryBrandImages.length > 0">
                                <li v-for="image in galeryBrandImages" v-bind:key="image.id">
                                    <img :src="storage+image.path" alt="photo-product" class="img img-fluid">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            //вх. парам. колекция с брендами
            jsonBrands: {
                type: Array,
                required: true,
            },
            //вх. парам. slug выбранного бренда
            typedSlug: {
                type: String,
                required: true,
            },
        },
        data() {
            return {
                storage: window.origin+'/storage/',
                noImage: window.origin+'/images/backend/no-image.png',
                brands: this.jsonBrands,
                slug: this.typedSlug,
                default: {
                    title: 'Немає заголовка бренду.',
                    description: 'Немає опису бренду.',
                },
                curent: {
                    title: '',
                    description: '',
                },
                galeryBrandImages: [],
                videoList: [],
            }
        },
        mounted: function () {
            this.curent.title = this.default.title;
            this.curent.description = this.default.description;
            this.sendSlugToServer(this.typedSlug);
        },
        methods: {
            //переменная флажка выбранного бренда
            ariaSelected(slug) {
                if (this.slug == slug) {
                    return true;
                } else {
                    return false;
                }
            },
            //обработчик события выбора бренда
            brandSelected(event) {
                // console.log(event.target.name);
                if (this.slug != event.target.name) {
                    this.slug = event.target.name;
                    this.sendSlugToServer(this.slug);
                }
            },
            sendSlugToServer(slug) {
                this.galeryBrandImages = [];
                this.videos = [];
                axios.post(window.origin+'/api/brand-details', {
                    slug: slug,
                })
                .then((response) => {
                    // console.log(response.data);
                    this.checkResponseData('title', response);
                    this.checkResponseData('details', response);
                    if (response.data.added_images.length > 0) {
                        this.galeryBrandImages = response.data.added_images;
                    }
                    if (response.data.videos.length > 0) {
                        this.videoList = response.data.videos;
                    } else {
                        this.videoList = [];
                    }
                    history.pushState(null, null, window.origin+window.location.pathname+'?brand='+this.slug);
                    this.$emit('change-brand', this.slug);
                })
                .catch(error => {
                    console.log(error);
                });
            },
            checkResponseData(property, response) {
                // console.log(property);
                // console.log(response);
                if (response.data[property]) {
                    this.curent[property] = response.data[property];
                } else {
                    this.curent[property] = this.default[property];
                }
            },
        }
    }
</script>

<style>
p {
    text-indent: 20px; /* Отступ первой строки в пикселах */
}
</style>
