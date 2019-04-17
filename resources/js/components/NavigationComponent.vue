<template>
    <nav class="navigation" id="navigation" v-bind:style="{ top: computedTop }"> 
        <navigation-logo :name="this.name" ></navigation-logo>
        <ul class="nav-list">
            <navigation-item 
                v-for="(page, url) in links" 
                :url="url" 
                :page="page"
                :currentPage="current" 
                :key="page.id"
            >
            </navigation-item>
        </ul>
    </nav>
</template>

<script>
import NavigationItem from './NavigationItem.vue';
import NavigationLogo from './NavigationLogo.vue';

export default {
    data: () => {
        return  {
            top: '0em',
        }
    },
    props: [
        'links',
        'current',
        'name',
    ],
    computed: {
        computedTop: function () {
            return this.top;
        }
    },
    components: {
        'navigation-item': NavigationItem,
        'navigation-logo': NavigationLogo,
    },
    methods: {
        
    },
    created() {
        
    }
}
</script>

<style lang="scss" scoped>
    @import "./../../sass/_variables.scss";

    .navigation {
        position: fixed;
        left: 0;
        z-index: 1;
        width: $sideNav-width;
        height: 100%;
        background-color: $sideNav-bg;
        box-shadow: 2px -2px 3px $black-color;
        padding: 1em 0em 1em 0em;
        transition: 0.05s;

        .nav-list {
            display: flex;
            flex-direction: column;
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
        .navigation {
            position: fixed;
            left: 0;
            z-index: 1;
            width: 4.5em;
            height: 100%;
            background-color: $sideNav-bg;
            box-shadow: 2px -2px 3px $black-color;
            padding: 1em 0em 1em 0em;
            transition: 0.05s;

            .nav-list {
                display: flex;
                flex-direction: column;
            }
        }
    }

    /* 
    ##Device = Most of the Smartphones Mobiles (Portrait)
    ##Screen = B/w 320px to 479px
    */
    @media (min-width: 320px) and (max-width: 480px) {
        .navigation {
            position: fixed;
            left: 0;
            z-index: 1;
            width: 4.5em;
            height: 100%;
            background-color: $sideNav-bg;
            box-shadow: 2px -2px 3px $black-color;
            padding: 1em 0em 1em 0em;
            transition: 0.05s;

            .nav-list {
                display: flex;
                flex-direction: column;
            }
        }
    }
</style>
