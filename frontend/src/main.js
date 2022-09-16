import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import PrimeVue from 'primevue/config';
import 'primeicons/primeicons.css';
import 'primevue/resources/themes/lara-light-teal/theme.css'

import './assets/main.css'
import Button from "primevue/button";
const app = createApp(App)

app.use(PrimeVue);
app.use(router)
app.component('Button', Button);


app.mount('#app')