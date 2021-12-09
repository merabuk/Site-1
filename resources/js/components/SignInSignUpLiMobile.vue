<template>
    <ul>
        <ul v-if="switchDisable">
            <li>
                <a href="javascript:void(0);" class="nav-link">
                    <i class="icon icon-user mr-3"></i>
                    <span>{{ userName }}</span>
                </a>
            </li>
            <li>
                <a :href="routeUser" class="nav-link">
                    <i class="icon icon-card mr-3"></i>
                    <span>{{ routeUserName }}</span>
                </a>
            </li>
        </ul>
        <li v-else>
            <a href="javascript:void(0);" class="nav-link">
                <i class="icon icon-user mr-3"></i>
                <span  data-toggle="modal" data-target="#loginModal">Вхід / Реєстрація</span>
            </a>
        </li>
    </ul>
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
            },
            //описание для url в меню конкретного пользователя
            routeUserName: {
                type: String,
                required: true,
            },
            //вх. парам. имя пользователя
            getUserName: {
                type: String,
                required: false,
            },
            //старое имя пользователя из сессии
            oldName: {
                type: String,
                required: false,
            }
        },
        data() {
            return {
            }
        },
        computed: {
            //Имя пользователя
            userName: function() {
                if(this.oldName != '') {
                    return this.oldName;
                } else  if (this.getUserName != '') {
                    return this.getUserName;
                }
            },
        },
    }
</script>
