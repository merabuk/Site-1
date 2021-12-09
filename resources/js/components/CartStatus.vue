<template>
    <div style="display:contents">
        <div class="block-number">
            <span>Загалом товарів: </span>
            <span class="number">{{ $store.state.allCartCount }}</span>
        </div>
        <div class="block-sum">
            <span class="d-none d-lg-inline-block">Сума: </span>
            <span class="total-sum">{{ $store.state.allCost }}</span>
            <span> грн.</span>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>
