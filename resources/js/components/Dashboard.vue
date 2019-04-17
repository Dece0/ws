<template>
    <div class="dashboard-container">
        <dashboard-date-item></dashboard-date-item>
        <dashboard-time-item></dashboard-time-item>
        <dashboard-counter-item></dashboard-counter-item>
        <dashboard-gps-item 
            :coords="coords"
        >
        </dashboard-gps-item>
        <dashboard-item 
            v-for="(item) in this.last_mensuration" 
            :data="item" 
            :key="item.id"
        >
        </dashboard-item>
    </div>
</template>

<script>
    import DashboardDateItem from './DashboardDateItem.vue';
    import DashboardTimeItem from './DashboardTimeItem.vue';
    import DashboardCounterItem from './DashboardCounterItem.vue';
    import DashboardGPSItem from './DashboardGPSItem.vue';
    import DashboardItem from './DashboardItem.vue';

    export default {
        props: [
            'last_mensuration',
            'coords'
        ],
        components: {
            'dashboard-date-item': DashboardDateItem,
            'dashboard-time-item': DashboardTimeItem,
            'dashboard-counter-item': DashboardCounterItem,
            'dashboard-gps-item': DashboardGPSItem,
            'dashboard-item': DashboardItem
        },
        methods: {

        },
        mounted() {
            console.log('DashboardItem.vue mounted.');
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/_variables.scss";

    .dashboard-container {
        display: grid;
        grid-gap: 2em;
        grid-template-columns: repeat(auto-fill, minmax(15em, 1fr));
        padding: $padding;

        .container:hover {
            filter: drop-shadow(1px 1px 4px #747373);
            transform: scale(1.025);
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
        .dashboard-container {
            display: grid;
            grid-gap: 1em;
            grid-template-columns: repeat(auto-fill, minmax(15em, 1fr));
            padding: $responsive-padding;

            .container:hover {
                filter: drop-shadow(1px 1px 4px #747373);
                transform: scale(1.025);
            }
        }
    }

    /* 
    ##Device = Most of the Smartphones Mobiles (Portrait)
    ##Screen = B/w 320px to 479px
    */
    @media (min-width: 320px) and (max-width: 480px) {
        .dashboard-container {
            display: grid;
            grid-gap: 1em;
            grid-template-columns: repeat(auto-fill, minmax(15em, 1fr));
            padding: 0;

            .container:hover {
                filter: drop-shadow(1px 1px 4px #747373);
                transform: scale(1.025);
            }
        }
    }
</style>

