<template>
    <span v-if="!switchDisable" class="icon icon-like-black"></span>
</template>

<script>
    export default {
        props: {
            //флажок переключатель состояния гость/авторизирован
            switchDisable: {
                required: true,
            },
        },
    }
</script>
