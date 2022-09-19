import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import VueApexCharts from "vue3-apexcharts";
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'



import './assets/main.css'



const app = createApp(App)
app.use(VueApexCharts);
app.use(router)


app.mount('#app')
