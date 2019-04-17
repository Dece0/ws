<template>
    <div class="settings-item">
        <input type="text" id="wsName" class="input" placeholder="Set name for weather station" maxlength="30" v-model="this.textInput" required>
        <label for="wsName">Set name</label>
    </div>
</template>

<script>
export default {
    data: function() {
        return  {
            textInput: this.station_name,
        }
    },
    props: [
        'station_name',
    ],
}
</script>

<style lang="scss" scoped>
    @import "./../../sass/_variables.scss";

    .settings-item {
        width: 100%;
        background-color: $white-color;
        text-align: left;
        color: $black-color;
        display: flex;
        flex-direction: column-reverse;
        margin: 1em 0 1em 0;

        label {
            font-size: 0.75em;
            color: #222222;
            transition: 0.5s;
        }

        .input {
            border: none;
            border-bottom: 1px solid #9e9e9e;
            width: 100%;
            height: 2.5em;
            font-size: 1em;
            transition: 0.5s;
        }

        .input:focus {
            border-bottom: 1px solid $color-from;
            box-shadow: 0 1px 0 0 $color-from;
        }

        .input:focus + label {
            color: $color-from;
        }
    }
    /* 
    ##Device = Laptops, Desktops
    ##Screen = B/w 1025px to 1280px
    */
    @media (min-width: 1025px) and (max-width: 1280px) {
        .settings-item {
            width: 100%;
            text-align: left;
            display: flex;
            flex-direction: column-reverse;
            margin: 1em 0 1em 0;

            label {
                font-size: 0.75em;
            }

            .input {
                width: 100%;
                height: 2.5em;
                font-size: 1em;
            }
        }
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
        .settings-item {
            width: 100%;
            background-color: $white-color;
            text-align: left;
            color: $black-color;
            display: flex;
            flex-direction: column-reverse;
            margin: 1em 0 1em 0;

            label {
                font-size: 0.75em;
                color: #222222;
                transition: 0.5s;
            }

            .input {
                border: none;
                border-bottom: 1px solid #9e9e9e;
                width: 100%;
                height: 2.5em;
                font-size: 1em;
                transition: 0.5s;
            }

            .input:focus {
                border-bottom: 1px solid $color-from;
                box-shadow: 0 1px 0 0 $color-from;
            }

            .input:focus + label {
                color: $color-from;
            }
        }
    }
</style>