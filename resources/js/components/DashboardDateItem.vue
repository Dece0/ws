<template>
    <div class="container">
        <small class="container-text"> Current date</small>
        <div class="container-data">
            <div class="data">{{ this.date }}</div>
        </div>
        <small class="container-text">{{ this.year }}</small>
    </div>
</template>

<script>
    export default {
        data: () => {
            return  {
                date: '',
                year: '',
            }
        },

        created() {
            this.date = new Date().toDateString().split(" ");
            this.year= this.date[3];
            this.date = `${this.date[0]} ${this.date[1]} ${this.date[2]}`;
        },

        mounted() {
            console.log('DashboardDateItem.vue mounted.')
        },

        methods: {

        }
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

    
    /* 
    ##Device = Laptops, Desktops
    ##Screen = B/w 1025px to 1280px
    */
    @media (min-width: 1025px) and (max-width: 1280px) {

    }

    /* 
    ##Device = Tablets, Ipads (portrait)
    ##Screen = B/w 768px to 1024px
    */
    @media (min-width: 768px) and (max-width: 1024px) {

    }

    /* 
    ##Device = Tablets, Ipads (landscape)
    ##Screen = B/w 768px to 1024px
    */
    @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
    
    }

    /* 
    ##Device = Low Resolution Tablets, Mobiles (Landscape)
    ##Screen = B/w 481px to 767px
    */
    @media (min-width: 481px) and (max-width: 767px) {
        .container {
            height: 10em;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            transition: 1s;
            
            .container-data {

                .data {
                    display: inline-block;
                    font-size: 2.0em;
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

                }
            }
        }
    }

    /* 
    ##Device = Most of the Smartphones Mobiles (Portrait)
    ##Screen = B/w 320px to 479px
    */
    @media (min-width: 320px) and (max-width: 480px) {
        .container {
            height: 10em;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            transition: 1s;
            
            .container-data {

                .data {
                    display: inline-block;
                    font-size: 2.0em;
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

                }
            }
        }
    }
</style>
