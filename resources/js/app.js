require('./bootstrap');

import { createApp } from 'vue'
import App from './components/App.vue'
import router from './router.js'
import VueApexCharts from "vue3-apexcharts";



createApp(App).use(router).use(VueApexCharts).mount('#app')