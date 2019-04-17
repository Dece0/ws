<template>
    <div class="container">
        <small class="container-text">
            <div class="select-style">
                <select name="timeSelector" class="select-css" id="timeSelectorForTemp" v-model="select"></select>
            </div>
        </small>
        <small class="container-text">Temperature: </small>
        <div class="container-data">
            <div class="data">{{ this.select }}</div>
            <small class="container-text">°C</small>
        </div>
    </div>
</template>

<script>
    import format from "date-fns";

    export default {
        props: [
            'forecastData',
            'time_data',
        ],
        data: function() {
            return  {
                'select': '', 
            }
        },
        methods: {
            formatDate(value) {
                return format.format(value, 'D MMM HH:mm');
            },
        },
        created() {
            
        },

        mounted() {
            let select = document.getElementById('timeSelectorForTemp');

            let index = 0;
            this.time_data.forEach( (element) => { 
                let opt = document.createElement("option");
                opt.value= this.forecastData[index];
                opt.innerHTML = `${this.formatDate(element.from.date)}`;

                select.appendChild(opt);
                index++;
            });
            this.select = this.forecastData[0];
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

        .btn {
            padding: 0.40em;
            border: 1px solid #134692;
            border-radius: 0.15em;
            color: #fff;
            font-size: 1.00em;
            cursor: pointer;
            background-image: linear-gradient(to right top, #1d56aa, #2064b7, #2573c4, #2b81d0, #3490dc);
            box-shadow: 0px 1px 3px #222222;
            transition: 1s; 
            width: 1.5em;
            margin: 1em;
        }

        .select-style {
            padding: 0;
            margin: 0 auto;
            border: 1px solid #ccc;
            width: 120px;
            border-radius: 3px;
            overflow: hidden;
            background-color: #fff;
            
            background: #fff url("http://www.scottgood.com/jsg/blog.nsf/images/arrowdown.gif") no-repeat 90% 50%;
        }

        .select-style select {
            padding: 5px 8px;
            width: 100%;
            border: none;
            box-shadow: none;
            background-color: transparent;
            background-image: none;
            -webkit-appearance: none;
            -moz-appearance: none;
                    appearance: none;
        }

        .select-style select:focus {
            outline: none;
        }

        .container-data {
            text-align: center;

            .data {
                display: inline-block;
                font-size: 2.5em;
            }

            .container-text {
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
</style>