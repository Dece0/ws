<template>
    <div class="graph-container">

        <div class="component-container" role="group">
            <button @click="changeComponent('chartjs-line')" type="button" class="btn component-btn left-btn">Line Chart</button>                   
            <button @click="changeComponent('chartjs-bar')" type="button" class="btn component-btn right-btn">Bar Chart</button>
        </div>

        <div class="controller-container">
            <div class="date-controller">
                <button class="btn date-input" id="datepicker-button-trigger">{{ formatDates(buttonDateOne, buttonDateTwo) || 'Select dates' }}</button>
                <airbnb-style-datepicker
                    :trigger-element-id="'datepicker-button-trigger'"
                    :mode="'range'"
                    :date-one="buttonDateOne"
                    :date-two="buttonDateTwo"
                    :min-date="'2018-02-28'"
                    :fullscreen-mobile="true"
                    :months-to-show="1"
                    :offset-y="200"
                    @date-one-selected="val => { buttonDateOne = val }"
                    @date-two-selected="val => { buttonDateTwo = val }"
                    @apply="showData"
                    @closed="onCancel"
                    @previous-month="onMonthChange"
                    @next-month="onMonthChange"
                >
                </airbnb-style-datepicker>
            </div>

            <div class="msg-controller1">
                <button  type="button" class="btn" @click="showMessage">Show message: {{ checkMessage() }}</button>
            </div>

            <div class="msg-controller2">
                <button type="button" class="btn" @click="cleanMessage()">Clean message</button>
            </div>

            <div class="export-controller">
                <button @click="isHidden = !isHidden" class="btn"><i class="fas fa-download"></i> Export</button>
                <graph-component-export-form  
                    v-if="!isHidden"
                    :dateFrom="this.dateFrom"
                    :dateTo="this.dateTo"
                    :csrf_token="this.csrf_token"
                    :quantityName="this.graph_name"    
                    v-model="isHidden"
                >
                </graph-component-export-form>
            </div>
        </div>
        
        <div class="msg-container">
            <ul class="msg-list">
                <li 
                    :class="messageClass(value)" 
                    v-for="(value,index) in message" 
                    :key="index"
                > 
                    {{ value }} 
                </li>
            </ul>
        </div>
        
        <div class="graph">
            <component 
                :is="now_component" 
                :datalabel="graph_name"
                :labels="labels" 
                :data="data" 
                :bind="true" 
                :pointborderwidth="6"
                :pointbordercolor="'rgb(209, 39, 39)'"
                :pointhoverborderwidth="3"
                :pointhoverbackgroundcolor="'#636b6f'"
                :pointhoverbordercolor="'rgb(255, 0, 0)'"
                :bordercolor="'rgb(248, 91, 0)'"
                :linetension="0.1"
                :fill="true"
                :backgroundcolor="'rgba(221, 144, 100, 0.075)'"
                :option="options"
            >
            </component>
        </div>
    </div> 
</template>
 
 <script>
    import { datasetMixin } from '../mixins/graphMixin.js';
    import { datePickerMixin } from '../mixins/datePickerMixin.js';
    import GraphComponentExportForm from './GraphComponentExportForm.vue';
    //import axios from 'axios';

    export default {
        mixins: [datasetMixin, datePickerMixin],
        props: [
            'csrf_token'
        ],

        data() {
            return {
                dateFrom: '',
                dateTo: '',
                isHidden: true,
            }
        },

        components: {
            'graph-component-export-form' : GraphComponentExportForm,
        },

        mounted() {
            console.log("GraphComponent.vue mounted!");
        },

        methods: {
            
        }
    }    
</script>

<style lang="scss" scoped>

    .graph-container {
        width: 60%;
        margin: 0 auto;
        background-color: #fff;
        color: #222222;
        border: 1px rgb(197, 197, 197) solid;
        padding: 0 0em 0.25em 0em;
        box-shadow: 0 0 10px 0px rgba(0,0,0,.35);

        .btn {
            padding: 0.40em;
            background-color: #fff;
            border: 1px solid #134692;
            border-radius: 0.15em;
            color: #fff;
            font-size: 1.00em;
            cursor: pointer;
            background-image: linear-gradient(to right top, #1d56aa, #2064b7, #2573c4, #2b81d0, #3490dc);
            box-shadow: 0px 1px 3px #222222;
            transition: 1s; 
        }

        .btn:hover {
            background-image: linear-gradient(to left bottom, #1d56aa, #2064b7, #2573c4, #2b81d0, #3490dc);
        }

        .component-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-bottom: 1em;

            .component-btn {
                width: 100%;
                font-size: 1.2em;
                transition: 0.5s;
            }

            .left-btn {
                border-radius: 0;
                border-right: none;
            }

            .right-btn {
                border-radius: 0;
            }
        }

        .controller-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-bottom: 1em;
            //flex-wrap: wrap;
            padding: 0 1em 0 1em;

            .date-controller {

                .date-input {
                    cursor: pointer;
                }
            }  

            .btn {
                margin: 0.5em;
            }
        }

        .msg-list {
            width: 30em;
            margin: 0 auto;

            li {
                text-align: left;
            }

            .success {
                color: #37c200;
            }

            .error {
                color: #fb2f2f;
            }

            .warning {
                color: #fbab00;
            }
        }
    }

    
    @media (min-width: 1281px) {

    }

    /* 
    ##Device = Laptops, Desktops
    ##Screen = B/w 1025px to 1280px
    */
    @media (min-width: 1025px) and (max-width: 1280px) {
        .graph-container {
            width: 80%;
            margin: 0 auto;
            padding: 0 0em 0.25em 0em;

            .btn {
                padding: 0.40em;
                border-radius: 0.15em;
                font-size: 1.00em;
            }

            .component-container {
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-bottom: 1em;

                .component-btn {
                    width: 100%;
                    font-size: 1.2em;
                    transition: 0.5s;
                }

                .left-btn {
                    border-radius: 0;
                    border-right: none;
                }

                .right-btn {
                    border-radius: 0;
                }
            }

            .controller-container {
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-bottom: 1em;
                //flex-wrap: wrap;

                .btn {
                    margin: 0.5em;
                }
            }

            .msg-list {
                li {
                    list-style: none;
                }
            }
        }
    }

    /* 
    ##Device = Tablets, Ipads (landscape)
    ##Screen = B/w 768px to 1024px
    */
    @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {   
        .graph-container {
            width: 90%;
            margin: 0 auto;
            padding: 0 0em 0.25em 0em;

            .btn {
                padding: 0.40em;
                border-radius: 0.15em;
                font-size: 1.00em;
            }

            .component-container {
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-bottom: 1em;

                .component-btn {
                    width: 100%;
                    font-size: 1.2em;
                    transition: 0.5s;
                }

                .left-btn {
                    border-radius: 0;
                    border-right: none;
                }

                .right-btn {
                    border-radius: 0;
                }
            }

            .controller-container {
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-bottom: 1em;
                //flex-wrap: wrap;

                .btn {
                    margin: 0.5em;
                }
            }

            .msg-list {
                li {
                    list-style: none;
                }
            }
        }
    }

    /* 
    ##Device = Low Resolution Tablets, Mobiles (Landscape)
    ##Screen = B/w 481px to 767px
    */
    @media (min-width: 481px) and (max-width: 767px) {
        .graph-container {
            width: 95%;
            margin: 0 auto;
            padding: 0 0em 0.25em 0em;

            .btn {
                padding: 0.25em;
                border-radius: 0.15em;
                font-size: 0.75em;
            }

            .component-container {
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-bottom: 1em;

                .component-btn {
                    width: 100%;
                    font-size: 1.2em;
                    transition: 0.5s;
                }

                .left-btn {
                    border-radius: 0;
                    border-right: none;
                }

                .right-btn {
                    border-radius: 0;
                }
            }

            .controller-container {
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-bottom: 1em;
                //flex-wrap: wrap;

                .btn {
                    margin: 0.25em;
                }
            }

            .msg-list {
                width: 20em;

                li {
                    list-style: none;
                }
            }
        }
    }

    /* 
    ##Device = Most of the Smartphones Mobiles (Portrait)
    ##Screen = B/w 320px to 479px
    */
    @media (min-width: 320px) and (max-width: 480px) {
        .graph-container {
            width: 95%;
            margin: 0 auto;
            padding: 0 0em 0.25em 0em;
            height: 50%;

            .btn {
                padding: 0.20em;
                border-radius: 0.15em;
                font-size: 0.75em;
            }

            .component-container {
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-bottom: 1em;

                .component-btn {
                    width: 100%;
                    font-size: 0.80em;
                    transition: 0.5s;
                }

                .left-btn {
                    border-radius: 0;
                    border-right: none;
                }

                .right-btn {
                    border-radius: 0;
                }
            }

            .controller-container {
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-bottom: 1em;
                flex-wrap: wrap;

                .btn {
                    margin: 0.25em;
                }
            }

            .msg-list {
                width: 15em;
                li {
                    list-style: none;
                }
            }
        }
    }
</style>
