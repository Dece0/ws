<template>
    <div class="info-container" v-if="!isHidden">
        <span>You are currently in OFFLINE mode.</span>
        <i @click="hideInfoContainer()" class="close fas fa-times"></i>
    </div>
</template>

<script>
export default {
    data: () => {
        return  {
            isHidden: false,
        }
    },
    methods: {
        hideInfoContainer() {
            this.isHidden = !this.isHidden;
            localStorage.setItem('info', 'closed');
        }
    },
    created() {
        let info = localStorage.getItem('info');
        if (!info) localStorage.setItem('info');
        if (info === 'closed') this.isHidden = !this.isHidden;
    }
}
</script>

<style lang="scss" scoped>
    @import "./../../sass/_variables.scss";

    .info-container {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 2;
        height: 1.25em;
        font-size: 1.5em;
        background-color: #4ba614;
        color: $white-color;
        padding: 0.5em;
        text-align: center;
        box-shadow: 0px 0px 3px $black-color;
        display: flex;
        align-items: center;
        justify-content: center;

        .close {
            position: absolute;
            right: 2em;
            cursor: pointer;
        }
    }

    .close {
        position: absolute;
        right: 2em;
        cursor: pointer;
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
        .info-container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 2;
            height: 1.25em;
            font-size: 1.0em;
            padding: 0.5em;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;

            .close {
                position: absolute;
                right: 2em;
                cursor: pointer;
            }
        }
    }

    /* 
    ##Device = Most of the Smartphones Mobiles (Portrait)
    ##Screen = B/w 320px to 479px
    */
    @media (min-width: 320px) and (max-width: 480px) {
        .info-container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 2;
            height: 1.25em;
            font-size: 1.0em;
            padding: 0.5em;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;

            .close {
                position: absolute;
                right: 2em;
                cursor: pointer;
            }
        }
    }
</style>
