<template>
    <div class="logo">
        <i class="fas fa-2x fa-cloud-sun-rain"></i>
        <h1 class="logo-text">{{ this.name }}</h1>
    </div>
</template>

<script>
export default {
    props: [
        'name',
    ],
    methods: {

    },
    created() {
        
    }
}
</script>

<style lang="scss" scoped>
    @import "./../../sass/_variables.scss";

    .logo {
        text-align: center;
        font-weight: bold;
        margin-bottom: 1em;
        color: $white-color;

        .logo-text {
            font-size: $font-size-base;
        }
    }
</style>
