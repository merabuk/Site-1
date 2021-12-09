<template>
    <div class="sale">
        {{ diff }}
    </div>
</template>

<script>
    export default {
        props: {
            //вх. парам. к чему применился компонент
            duration: {
                type: String,
                required: true,
            },
        },
        data() {
            return {
                now: new Date(),
                // diff: '',
            }
        },
        computed: {
            diff() {
                let difference = new Date(Date.parse(this.duration) - this.now);
                setTimeout(() => this.now = new Date(), 1000);
                if (difference.getDate() == '0') {
                    return difference.getHours() + ':' + difference.getMinutes() + ':' + difference.getSeconds();
                } else {
                    return difference.getDate() + 'д ' + difference.getHours() + ':' + difference.getMinutes() + ':' + difference.getSeconds();
                }
            }
        },
    }
</script>
