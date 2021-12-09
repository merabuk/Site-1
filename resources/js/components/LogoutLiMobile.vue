<template>
    <li v-if="switchDisable">
        <a :href="routeLogout" class="nav-link" v-on:click.prevent="logout()">
            <i class="icon icon-sing-out mr-3"></i>
            <span>Вийти</span>
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
                    // console.log(response);
                    //событие логаута
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
