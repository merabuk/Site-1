<template>
  <div>
        <div class="row">
            <div class="col-12">
                <div class="invalid-feedback d-block mb-2" v-html="validationErrors"></div>
            </div>
            <div class="col-12" v-for="(upload, index) in uploads" v-bind:key="index">
                <div class="card card-primary">
                    <div class="card-header py-1">
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0 d-flex justify-content-center">
                        <img v-if="upload.imageSource === 'empty'" v-bind:src="origin+'images/backend/no-image.png'" class="img-fluid" v-bind:id="'picture'+index">
                        <img v-else-if="upload.imageSource === 'db'" :src="storage+upload.path" class="img-fluid" v-bind:id="'picture'+index">
                        <img v-else :src="upload.path" class="img-fluid" v-bind:id="'picture'+index">
                        <input type="file" class="custom-file-input d-none" v-on:change="changeFile(index)" v-bind:id="'input'+index" v-bind:name="isEdit ? '' : 'images[]'">
                    </div>
                    <div v-bind:class="['card-footer d-flex', multiUpload ? 'justify-content-between' : 'justify-content-end', 'align-items-center']">
                        <input v-if="multiUpload" type="number" class="form-control" v-on:change="changeOrder(index)" v-bind:id="'order'+index" v-model="upload.order" name="order[]" placeholder="Введіть порядковий номер зображення">
                        <input v-if="!isEdit&&!multiUpload" type="hidden" name="is_main[]" value="1">
                        <div class="btn-group btn-group-sm">
                            <a href="#" class="btn btn-info ml-2" v-on:click.prevent="selectFile(index)"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger" v-on:click.prevent="deleteFile(index)"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <a v-if="showAddBtn" class="btn btn-block bg-success" v-on:click.prevent="addFile()"><i class="fas fa-plus-circle"></i> Додати зображення</a>
            </div>
        </div>
  </div>
</template>

<script>
export default {
  props: {
        //Много/одно фото возможно загрузить
        multiUpload: {
            type: Boolean,
            required: false,
            default: false,
        },
        parentModelClass: {
            type: String,
            required: false,
        },
        parentModelId: {
            type: Number,
            required: false,
        },
        //Путь к картинкам в папке public
        pathToSave: {
            type: String,
            required: true,
        },
        //Существующие картинки єкземпляра при редактировании
        images: {
            required: false,
        },
        //Ошибки валидации формы создания (не редактирования)
        errors: {
            required: false,
            default:false,
        }
  },
  computed: {
        isEdit() {
            return (this.parentModelClass && this.parentModelId);
        },
        showAddBtn() {
            if (this.multiUpload) {
                return true;
            } else {
                if (this.uploads.length < 1) {
                    return true;
                };
                return false;
            };
        },
        validationErrors() {
            var validation = [];
            for (let key in this.err) {
                if (key.includes('images.')) {
                    validation.push(this.err[key][0]);
                };
            };
            validation.push(this.err_img['img']);
            return validation.join('</br>');
        },
  },
  data() {
    return {
        origin: window.origin+'/',
        storage: window.origin+'/storage/',
        config: {
            headers: {
                Authorization: 'Bearer ' + window.laravel.api_token,
                Accept: 'application/json',
            },
        },
        put_config: {
            headers: {
                Authorization: 'Bearer ' + window.laravel.api_token,
                Accept: 'application/json',
                'content-type': 'multipart/form-data',
            },
        },
        uploads: [

        ],
        err: this.errors,
        err_img: {
            img: '',
        },
    };
  },
  methods: {
    //Добавить файл
    addFile() {
        let emptyImage = {
            id: '',
            path: '',
            order: null,
            'is_main': !this.multiUpload,
            imageable_type: this.parentModelClass,
            imageable_id: this.parentModelId,
            imageSource: 'empty',
        };
        if (this.isEdit) {
            axios
                .post(window.origin+'/api/images', emptyImage, this.config)
                .then(response => {
                    // handle success
                    emptyImage.id = response.data.image.id;
                    this.uploads.push(emptyImage);
                })
                .catch(error => {
                    // handle error
                    console.log(error);
                })
                .then(() => {
                    // always executed
                });
        } else {
            this.uploads.push(emptyImage);
        };
    },
    //Вызов диалогового окна выбора файла
    selectFile(index) {
        let currentInput = this.$el.querySelector("#input" + index);
        currentInput.click();
    },
    //Изменить файл
    changeFile(index) {
        let currentInput = this.$el.querySelector("#input" + index);
        if (this.isEdit) {
            var form = new FormData()
                form.append('img', currentInput.files[0], currentInput.files[0].name);
                form.append('order', this.uploads[index].order);
                form.append('pathToSave', this.pathToSave);
                if (!this.multiUpload) {
                    form.append('is_main', true);
                }
                form.append ('_method', 'PUT');
            axios
                .post(window.origin+'/api/images/'+this.uploads[index].id, form, this.put_config)
                .then((response) => {
                    // handle success
                    this.uploads[index].id = response.data.image.id;
                    this.uploads[index].path = response.data.image.path;
                    this.uploads[index].imageSource = 'db';
                })
                .catch((error) => {
                    // handle error
                    this.err_img['img'] = ''+JSON.parse(error.request.response).errors.img[0];
                })
                .then(() => {
                    // always executed
                });
        } else {
            this.uploads[index].path = URL.createObjectURL(currentInput.files[0]);
            this.uploads[index].imageSource = 'blob';
        };

    },
    //Изменить порядок сортировки
    changeOrder(index) {
        if (this.isEdit) {
            var form = new FormData()
                form.append('order', this.uploads[index].order);
                form.append ('_method', 'PUT');
            axios
                .post(window.origin+'/api/images/'+this.uploads[index].id, form, this.put_config)
                .then(response => {
                    // handle success
                })
                .catch(error => {
                    // handle error
                    console.log(error);
                })
                .then(() => {
                    // always executed
                });
        };
    },
    //Удалить файл
    deleteFile(index) {
        if (this.isEdit) {
            axios
                .delete(window.origin+'/api/images/'+this.uploads[index].id, this.config)
                .then(response => {
                    // Успешно удалено из базы
                    this.uploads.splice(index, 1);
                })
                .catch(error => {
                    // Ошибка удаления
                    console.log(error);
                })
                .then(() => {
                    // Всегда запускается после запроса
                });
        } else {
            this.uploads.splice(index, 1);
        };
    },
  },
  mounted() {
    if (this.images) {
        this.images.forEach(image => {
            if (image.path) {
                image.imageSource = 'db';
            } else {
                image.imageSource = 'empty';
            };
        });
        this.uploads = this.images;
    };
  },
};
</script>
