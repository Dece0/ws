<template>
    <div class="container">
        <small class="container-text"> Counter </small>
        <div class="container-data">
            <div class="data">{{this.counter}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => {
            return  {
                hours: "4",
                mimutes: "00",
                seconds: "00",
                counter: "",
            }
        },

        created() {
            this.counter = `${this.hours}:${this.mimutes}:${this.seconds}`;
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