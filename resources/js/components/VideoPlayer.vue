<template>
    <slick ref="slick" :options="slickOptions" :class="{'brand-video': videos.length > 1}" :style="'max-width: '+viewWidth">
        <a v-for="video in videos" v-bind:key="video.id">
            <iframe :src="video.src" class="embed-responsive"
                allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
                Ваш браузер не підтримує фрейми.
            </iframe>
        </a>
    </slick>
</template>

<script>
    import Slick from 'vue-slick';
    export default {
        components: { Slick },
        props: {
            //массив с видео ссылками
            videos: {
                required: false,
            },
            viewWidth:{
                type: String,
                required: true,
            }
        },
        data() {
            return {
                slickOptions: {
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    prevArrow: '<button class="slick-prev slick-arrow d-none d-sm-block" aria-label="Попереднэ" type="button" style="">Попереднэ</button>',
                    nextArrow: '<button class="slick-next slick-arrow d-none d-sm-block" aria-label="Наступне" type="button" style="">Наступне</button>',
                    dots: true,
                    dotsClass: "slick-dots",
                    adaptiveHeight: true,
                },
            }
        },
        beforeUpdate() {
            if (this.$refs.slick) {
                this.$refs.slick.destroy();
            }
        },
        updated() {
            this.$nextTick(function () {
                if (this.$refs.slick) {
                    this.$refs.slick.create(this.slickOptions);
                }
            });
        },
        methods: {
            // All slick methods can be used too, example here
            next() {
                this.$refs.slick.next();
            },
            prev() {
                this.$refs.slick.prev();
            },
            reInit() {
                // Helpful if you have to deal with v-for to update dynamic lists
                this.$nextTick(() => {
                    this.$refs.slick.reSlick();
                });
            },
        }
    }
</script>
