<template>
    <li v-if="switchDisable">
        <a :href="path" class="nav-link">
            <i class="icon icon-favorite-heart-white mr-3"></i>
            <span>Обране</span>
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
