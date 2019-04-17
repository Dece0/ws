<template>
    <div class="forecast-container">
        <forecast-info-item 
            :forecast_info="this.forecast_info.city"/>
        <forecast-sun-item 
            :forecast_info="this.forecast_info.sun"/>
        <forecast-temperature-item
            :forecastData="this.temperatureData"
            :time_data="this.timeData"/>
        <forecast-humidity-component
            :forecastData="this.humidityData"
            :time_data="this.timeData"/>
        <forecast-pressure-item
            :forecastData="this.pressureData"
            :time_data="this.timeData"/>
        <forecast-wind-item
            :forecastData="this.windData"
            :time_data="this.timeData"/>
        <forecast-weather-item
            :forecastData="this.weatherData"
            :time_data="this.timeData"
            v-model="this.time"/>
    </div>
</template>

<script>
    import ForecastInfoItem from './ForecastInfoItem.vue';
    import ForecastSunItem from './ForecastSunItem.vue';
    import ForecastTemperatureItem from './ForecastTemperatureItem.vue';
    import ForecastHumidityComponent from './ForecastHumidityComponent.vue';
    import ForecastPressureItem from './ForecastPressureItem.vue';
    import ForecastWindItem from './ForecastWindItem.vue';
    import ForecastWeatherItem from './ForecastWeatherItem.vue';
    import format from "date-fns";
    
    export default {
        props: [
            'forecast_info',
            'forecast_weather'
        ],
        data: function() {
            return  {
                'temperatureData': [],
                'humidityData': [],
                'pressureData': [],
                'windData': [],
                'weatherData': [],
                'timeData': [],
                'time': '',
            }
        },
        components: {
            'forecast-info-item': ForecastInfoItem,
            'forecast-sun-item': ForecastSunItem,
            'forecast-temperature-item': ForecastTemperatureItem,
            'forecast-humidity-component': ForecastHumidityComponent,
            'forecast-pressure-item': ForecastPressureItem,
            'forecast-wind-item': ForecastWindItem,
            'forecast-weather-item': ForecastWeatherItem
        },
         methods: {
            formatDate(value) {
                return format.format(value, 'D MMM HH:mm');
            },
        },
        created() {
            this.forecast_weather.forEach( (item) => {
                this.temperatureData.push(item.temperature.now.value);
                this.windData.push(item.wind.speed);
                this.weatherData.push(item.weather);
                this.humidityData.push(item.humidity);
                this.pressureData.push(item.pressure);
                this.timeData.push(item.time);
            });
            this.time = this.formatDate(this.timeData[0].from.date);
        },
        mounted() {
            console.log('ForecastComponent.vue mounted.');
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/_variables.scss";

    .forecast-container {
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
        .forecast-container {
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
        .forecast-container {
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

