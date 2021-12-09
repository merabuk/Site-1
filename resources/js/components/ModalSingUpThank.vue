<template>
    <div class="modal fade modal-custom-moto" id="modal-sing-up-thank" tabindex="-1" role="dialog" aria-labelledby="modal-sing-up-thank-Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h5 class="title" id="modal-sing-up-thank-Label"><span>Дякуємо</span> за реєстрацію!</h5>
                <div class="modal-bottom btn-group">
                    <a v-if="switchDisable" :href="routeUser" class="btn full-color">Особистий кабінет</a>
                    <a :href="routeHome" class="btn">Головна сторінка</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            //флажок переключатель состояния гость/авторизирован
            switchDisable: {
                required: true,
            },
            //url в меню для конкретного пользователя
            routeUser: {
                type: String,
                required: true,
                default: '',
            },
        },
        data() {
            return {
                routeHome: window.origin,
            }
        },
    }
</script>
