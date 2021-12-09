<template>
    <li v-if="switchDisable">
        <a :href="path" class="d-none d-lg-block">
            <i class="icon icon-favorite-heart-white"></i>
        </a>
    </li>
</template>

<script>
    export default {
        props: {
            switchDisable: {
                required: true,
            },
            path: {
                required: true,
            },
        }
    }
</script>
