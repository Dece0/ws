<template>
    <li :class="setClass(this.currentPage)">
        <a :href="setUrl(this.url)">
            <i :class="setIcon(this.page)"></i>
            {{ this.page }} 
        </a>
    </li>
</template>

<script>
export default {
    props: [
        'url',
        'page',
        'currentPage'
    ],
    methods: {
        setUrl(url) {
            if (url == '') return '/';
            return url;
        },
        setClass(currentPage) {
            if(currentPage === this.url) return "nav-item selected";
            if(currentPage === null && this.url === "") return "nav-item selected";
            return "nav-item";
        },
        setIcon(page) {
            let icon = 'fas fa-2x ';
            switch (page) {
                case 'Dashboard':
                    icon += 'fa-compass';
                    break;
                case 'Temperature':
                    icon += 'fa-thermometer-half';
                    break;
                case 'Humidity':
                    icon += 'fa-tint';
                    break;
                case 'Pressure':
                    icon += 'fa-wind';
                    break;
                case 'Air':
                    icon += 'fa-smog';
                    break;
                case 'Uv':
                    icon += 'fa-sun'
                    break;
                case 'Gas':
                    icon += 'fa-radiation';
                    break;
                case 'Settings':
                    icon += 'fa-tools';
                    break;
                default:
                    break;
            }
            return icon;
        }
    },
    created() {
        
    }
}
</script>

<style lang="scss" scoped>
    @import "./../../sass/_variables.scss";

    .nav-item {
        list-style: none;
        font-size: 1em;
        text-align: center;

        a {
            display: flex;
            flex-direction: column;
            padding: 0.5em 0.25em 0.5em 0.25em;
            text-decoration: none;
            color: rgb(184,176,183);
            transition: 0.7s;

            i {
                margin-bottom: 0.25em;
            }
        }

        a:hover {
            color: $white-color;
            animation: hover-animation 2s;
        }
    }

    .selected {
        background-image: linear-gradient(to right top, #1d56aa, #2064b7, #2573c4, #2b81d0, #3490dc);
        box-shadow: 0px 0px 3px $black-color;

        a {
            color: $white-color;
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
        .nav-item {
            list-style: none;
            font-size: 0.75em;
            text-align: center;

            a {
                display: flex;
                flex-direction: column;
                padding: 0.5em 0.25em 0.5em 0.25em;
                text-decoration: none;
                color: rgb(184,176,183);
                transition: 0.7s;

                i  {
                    margin-bottom: 0.25em;
                }
            }
        }  

        .selected {
            background-image: linear-gradient(to right top, #1d56aa, #2064b7, #2573c4, #2b81d0, #3490dc);
            box-shadow: 0px 0px 3px $black-color;

            a {
                color: $white-color;
            } 
        }
    }

    /* 
    ##Device = Most of the Smartphones Mobiles (Portrait)
    ##Screen = B/w 320px to 479px
    */
    @media (min-width: 320px) and (max-width: 480px) {
        .nav-item {
            list-style: none;
            font-size: 0.75em;
            text-align: center;

            a {
                display: flex;
                flex-direction: column;
                padding: 0.5em 0.25em 0.5em 0.25em;
                text-decoration: none;
                color: rgb(184,176,183);
                transition: 0.7s;

                i  {
                    margin-bottom: 0.25em;
                }
            }
        } 
        
        .selected {
            background-image: linear-gradient(to right top, #1d56aa, #2064b7, #2573c4, #2b81d0, #3490dc);
            box-shadow: 0px 0px 3px $black-color;

            a {
                color: $white-color;
            } 
        } 
    }
</style>
