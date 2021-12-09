<template>
    <li>
        <div v-if="switchDisable" class="dropdown">
            <a class="d-none d-lg-block" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                <i class="icon icon-user-active"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuOffset">
                <span class="dropdown-item-text" href="" disable>{{ userName }}</span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" :href="routeUser">{{ routeUserName }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" :href="routeLogout" v-on:click.prevent="logout">Вийти</a>
            </div>
        </div>
        <a v-else href="" class="d-none d-lg-block" data-toggle="modal" data-target="#loginModal">
            <i class="icon icon-user"></i>
        </a>
    </li>
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
                routeLogout: window.origin+'/logout',
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
        methods: {
            //асинхронный логаут
            logout() {
                axios.post(this.routeLogout)
                .then((response) => {
                    //событие разлогинивания
                    this.$emit('logout-success', false);
                    location.replace(window.origin);
                })
                .catch(error => {
                    // console.log(error);
                });
            },

        }
    }
</script>
