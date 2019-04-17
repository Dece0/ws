/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('info-component', require('./components/InfoComponent.vue').default);
Vue.component('dashboard-component', require('./components/Dashboard.vue').default);
Vue.component('forecast-component', require('./components/ForecastComponent.vue').default);
Vue.component('navigation-component', require('./components/NavigationComponent.vue').default);
Vue.component('graph-component', require('./components/GraphComponent.vue').default);
Vue.component('settings-component', require('./components/SettingsComponent.vue').default);

// vue-airbnb-style-datepicker
// import component and stylesheet
import AirbnbStyleDatepicker from 'vue-airbnb-style-datepicker';
import 'vue-airbnb-style-datepicker/dist/vue-airbnb-style-datepicker.min.css';
// see docs for available options
const datepickerOptions = {};
// make sure we can use it in our components
Vue.use(AirbnbStyleDatepicker, datepickerOptions);

// hchs-vue-charts
// chartjs package
require('chart.js');
// vue-charts package
require('hchs-vue-charts');
Vue.use(VueCharts);
Vue.config.devtools = true;

//init vue
const app = new Vue({
    el: '#app',
});

