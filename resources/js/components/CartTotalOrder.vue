<template>
        <div class="total type-2">
            <div class="container block-total">
                <div class="block-sum"><span>До сплати:</span><span class="total-sum total-sum-orders">{{ $store.state.allCost }}</span><span> грн.</span></div>
                <button id="button-create-order" class="btn-custom-project">Завершити оформлення</button>
            </div>
        </div>
</template>

<script>
    export default {
    }
</script>
