<template>
    <div class="settings-container">
        <form action="" method="post">
            <div class="settings-header">
                <h1>Main settings</h1>
            </div>

            <settings-name-item 
                :station_name="this.station_name"
            >
            </settings-name-item>

            <settings-time-item 
                v-for="(time, quantity) in units"
                :quantity="quantity"
                :time="time"
                :key="quantity.id"
            >
            </settings-time-item>
            <button type="submit" class="btn">Save settings</button>
        </form>
    </div>
</template>

<script>
import SettingsNameItem from './SettingsNameItem';
import SettingsTimeItem from './SettingsTimeItem';

export default {
    props: [
        'units',
        'station_name'
    ],
    components: {
        'settings-name-item': SettingsNameItem,
        'settings-time-item': SettingsTimeItem,
    },
    mounted() {
    }
}
</script>

<style lang="scss" scoped>
    @import "./../../sass/_variables.scss";

    .settings-container {
        width: 75%;
        background-color: $white-color;
        margin: 0 auto;
        padding: 1em;

        .settings-header {
            color: $black-color;
            text-align: left;
            margin-bottom: 1em;
        }

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
    }

    /* 
    ##Device = Laptops, Desktops
    ##Screen = B/w 1025px to 1280px
    */
    @media (min-width: 1025px) and (max-width: 1280px) {
        .settings-container {
            width: 75%;
            margin: 0 auto;
            padding: 1em;

            .settings-header {
                text-align: left;
                margin-bottom: 1em;
            }

            .btn {
                padding: 0.40em;
                border-radius: 0.15em;
                font-size: 1.00em;
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
        .settings-container {
            width: 90%;
            margin: 0 auto;
            padding: 1em;

            .settings-header {
                text-align: left;
                margin-bottom: 1em;
            }

            .btn {
                padding: 0.40em;
                border-radius: 0.15em;
                font-size: 1.00em;
            }
        }
    }

    /* 
    ##Device = Most of the Smartphones Mobiles (Portrait)
    ##Screen = B/w 320px to 479px
    */
    @media (min-width: 320px) and (max-width: 480px) {
        .settings-container {
            width: 90%;
            margin: 0 auto;
            padding: 0.5em;

            .settings-header {
                text-align: left;
                margin-bottom: 1em;
            }

            .btn {
                padding: 0.40em;
                border-radius: 0.15em;
                font-size: 1.00em;
            }
        }
    }
</style>
