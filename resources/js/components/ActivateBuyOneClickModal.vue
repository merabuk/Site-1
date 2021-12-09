<template>
    <a href="" class="one-click-buy" v-on:click.prevent="checkAttributes">
        <span>Купити в 1 клік</span>
        <span class="icon icon-bag-orange"></span>
    </a>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    formData: [],
                },
            }
        },
        methods: {
            //проверка на выбор атрибутов
            checkAttributes() {
                this.getFormData();
                if (this.form.formData.length != 0) {
                    var allSelect = false;
                    $.each(this.form.formData, (index, value) => {
                        if (value['value'] == '') {
                            allSelect = true;
                            return false;
                        };
                    });
                    if (allSelect) {
                        $('#Modal-warning').modal('show');
                        return false;
                    } else {
                        this.inputDisable = false;
                        $('#buyOneClickModal').modal('show');
                    };
                } else {
                    $('#Modal-warning').modal('show');
                    return false;
                };
            },
            getFormData() {
                this.form.formData = $('#CardProductAttr').serializeArray();
            },
        }
    }
</script>
