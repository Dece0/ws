<template>
    <div class="main-container">
        <div class="export-container">
            <i class="close fas fa-times"
                @click="updateValue(!value)"  
            >
            </i>
            <div class="form-container">
                <form action="download" method="post">
                    <input type="hidden" name="dateFrom" v-model="this.dateFrom">
                    <input type="hidden" name="dateTo" v-model="this.dateTo">
                    <input type="hidden" name="_token" v-model="this.csrf_token">
                    <input type="hidden" name="quantityName" v-model="this.quantityName">
                    <button type="submit" class="btn"><i class="fas fa-download"></i> Export selected range</button>
                </form>
                <form action="downloadAll" method="post">
                    <input type="hidden" name="_token" v-model="this.csrf_token">
                    <input type="hidden" name="quantityName" v-model="this.quantityName">
                    <button type="submit" class="btn"><i class="fas fa-download"></i> Export all data</button>
                </form> 
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'dateFrom',
            'dateTo',
            'csrf_token',
            'value',
            'quantityName',
        ],
        methods: {
            updateValue: function (value) {
                this.$emit('input', value);
            }
        },
        mounted() {
            console.log('GraphComponentExportForm.vue mounted.')
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/_variables.scss";
    
    .main-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 99;
        background-color: rgba(46, 46, 46, 0.612);
        display: flex;
        justify-content: center;
        align-items: center;

        .export-container {
            background-color: #fff;
            width: 15em;
            margin: 0 auto;
            padding: 2em;
            border: 1px rgb(197, 197, 197) solid;
            box-shadow: 0 0 10px 0px rgba(0,0,0,.35);

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
                width: 12em;
                margin: 1em;
            }

            .btn:hover {
                background-image: linear-gradient(to left bottom, #1d56aa, #2064b7, #2573c4, #2b81d0, #3490dc);
            }

            .close {
                cursor: pointer;
                position: relative;
                top: -1.75em;
                right: -8.00em;
                padding: 0.40em;
                border: 1px solid #134692;
                border-radius: 0.15em;
                color: #fff;
                font-size: 1.00em;
                background-image: linear-gradient(to right top, #1d56aa, #2064b7, #2573c4, #2b81d0, #3490dc);
                box-shadow: 0px 1px 3px #222222;
                transition: 1s; 
                width: 1.5em;
            }

             .close:hover {
                background-image: linear-gradient(to left bottom, #1d56aa, #2064b7, #2573c4, #2b81d0, #3490dc);
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

    }

    /* 
    ##Device = Most of the Smartphones Mobiles (Portrait)
    ##Screen = B/w 320px to 479px
    */
    @media (min-width: 320px) and (max-width: 480px) {

    }
</style>
