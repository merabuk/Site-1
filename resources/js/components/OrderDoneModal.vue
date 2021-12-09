<template>
    <div class="modal fade" id="Modal-thank" tabindex="-1" role="dialog" aria-labelledby="thankModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-top">
                    <h5 class="title" >Дякуємо!</h5>
                </div>
                <div class="modal-body">
                        <span class="text-thank">Ваше замовлення успішно оформлено.</span>
                        <span class="text-thank">Ми зв'яжемося з Вами найближчим часом!</span>
                    <span class="text-thank"> Номер замовлення <span class="number-order"></span></span>
                </div>
                <div class="modal-bottom">
                    <a href="/" class="btn">Повернутися на головну</a>
                    <a href="" class="btn ctb" v-on:click.prevent="continueToBuy">Продовжити купувати</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            continueToBuy() {
                location.reload();
            },
        }
    }
</script>
