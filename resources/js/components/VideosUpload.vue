<template>
    <div class="row">
        <div class="col-12" v-if="showList">
            <div class="card card-primary" v-for="(upload, index) in uploads" v-bind:key="index">
                <div class="card-body">
                    <label>Назва відео</label>
                    <input type="text" class="form-control mb-3" name="video-name[]" placeholder="Введіть назву відео"
                        :value="upload.name"
                        :class="{ 'is-invalid' : errors['video-name.'+index] }">
                    <div v-if="errors['video-name.'+index]" class="invalid-feedback">{{ errors['video-name.'+index][0] }}</div>
                    <label>Ссилка на відео</label>
                    <input type="text" class="form-control" name="video-src[]" placeholder="Введіть ссилку на відео"
                        :value="upload.src"
                        :class="{ 'is-invalid' : errors['video-src.'+index] }">
                    <div v-if="errors['video-src.'+index]" class="invalid-feedback">{{ errors['video-src.'+index][0] }}</div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <input type="number" class="form-control" name="video-order[]" placeholder="Введіть порядковий номер відео"
                            :value="upload.order"
                            :class="{ 'is-invalid' : errors['video-order.'+index] }">
                        <div v-if="errors['video-order.'+index]" class="invalid-feedback">{{ errors['video-order.'+index][0] }}</div>
                        <div class="btn-group btn-group-sm ml-3">
                            <a href="#" class="btn btn-danger" v-on:click.prevent="deleteVideo(index)"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <a class="btn btn-block bg-success" v-on:click.prevent="addVideo"><i class="fas fa-plus-circle"></i>Додати відео</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            //Существующие картинки экземпляра
            videos: {
                required: false,
            },
            //Ошибки валидации формы создания (не редактирования)
            errors: {
                required: false,
            }
        },
        data() {
            return {
                showList: false,
                uploads: [
                    {
                        name: '',
                        order: 1,
                        src: '',
                    },
                ],
            }
        },
        methods: {
            //Добавить видео
            addVideo() {
                if (!this.showList) {
                    this.showList = true;
                    // console.log(this.uploads.length);
                } else {
                    let curOrder = 1;
                    // let curIndex = 0;
                    if (this.uploads.length > 0) {
                        // curIndex = this.uploads.length;
                        curOrder = this.uploads[this.uploads.length - 1].order;
                        curOrder++;
                    }
                    let uploads = {
                        name: '',
                        order: curOrder,
                        src: '',
                    };
                    this.uploads.push(uploads);
                    // this.$nextTick(function () {
                    //     let uploads = {};
                    //     Vue.set(uploads, 'name', '');
                    //     Vue.set(uploads, 'order', curOrder);
                    //     Vue.set(uploads, 'src', '');
                    //     Vue.set(this.uploads, curIndex, uploads);
                    // });
                    // console.log(this.uploads.length);
                }
            },
            //Удалить видео
            deleteVideo(index) {
                this.uploads.splice(index, 1);
            }
        },
        mounted() {
            if (this.videos) {
                if (this.videos.length > 0) {
                    // console.log(this.videos);
                    this.uploads = this.videos;
                    this.showList = true;
                }
            }
        },
    };
</script>
