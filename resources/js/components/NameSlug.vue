<template>
    <div>
        <div class="form-group">
            <label for="name" class="red-star">{{ lableName }}</label>
            <input type="text" class="form-control" :class="{ 'is-invalid' : errorName }" id="name" name="name"
                :placeholder="placeholderName" v-model="inputName">
                <div v-if="errorName" class="invalid-feedback">{{ errorName }}</div>
        </div>
        <div class="form-group">
            <label for="slug" class="red-star" >{{ lableSlug }}</label>
            <input type="text" class="form-control" :class="{ 'is-invalid' : errorSlug }" id="slug" name="slug"
                :placeholder="placeholderSlug" :value="inputSlug" v-on:blur="changeSlug">
                <div v-if="errorSlug" class="invalid-feedback">{{ errorSlug }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            //вх. парам. к чему применился компонент
            title: {
                type: String,
                required: true,
            },
            //вх. парам. старое имя
            oldName: {
                type: String,
                required: false,
                default: '',
            },
            //вх. парам. ошибок имени
            errorName: {
                type: String,
                required: false,
                default: '',
            },
            //вх. парам. ошибок slug
            errorSlug: {
                type: String,
                required: false,
                default: '',
            },
        },
        data() {
            return {
                lableName: 'Назва '+this.title,
                lableSlug: 'SEO-url '+this.title,
                placeholderName: 'Введіть назву '+this.title,
                placeholderSlug: 'SEO-url '+this.title,
                inputName: '',
                inputSlug: '',
            }
        },
        mounted () {
            if (this.oldName) {
                this.inputName = this.oldName;
                this.inputSlug = slug(this.oldName);
            }
        },
        watch: {
            //обработчик события смены имени
            inputName: function() {
                this.inputSlug = slug(this.inputName);
            },
        },
        // computed: {
        //     inputSlug() {
        //         return slug(this.inputName);
        //     }
        // },
        methods: {
            //обработчик события смены slug
            changeSlug(event) {
                this.inputSlug = slug(event.target.value);
            }
        }
    }
</script>
