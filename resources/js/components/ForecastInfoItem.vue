<template>
    <div class="container">
        <small class="container-text">Forecast location info</small>
        <div class="container-data">
            <small class="container-text">country: </small>
            <div class="data">{{ this.forecast_info.country }}</div>
        </div>
        <div class="container-data">
            <small class="container-text">city: </small>
            <div class="data">{{ this.forecast_info.name }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'forecast_info',
        ],

        created() {
            
        },

        mounted() {
            
        },
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/_variables.scss";   

    .container {
        background-color: $white-color;
        color: $black-color;
        box-shadow: 0px 0px 5px #7d7d7d;
        height: 10em;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        transition: 1s;

        .container-data {
            
            .data {
                display: inline-block;
                font-size: 2.5em;
            }

            .container-text {
                text-align: start;
                padding-left: 1em;

                .container-rating {
                    width: 1rem;
                    height: 1rem;
                    border-radius: 50%;
                    display: inline-block;
                    margin-bottom: 0.5rem;
                }

                .green {
                    @include set-color(rgb(68, 167, 68));
                }

                .red {
                    @include set-color(rgb(190, 44, 44));
                }
            }
        }
    }
</style>