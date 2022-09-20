import { createApp } from 'vue'
import App from './App.vue'
import router from './router/router'
import store from "@/store/store";
import PrimeVue from 'primevue/config';
import 'primeicons/primeicons.css';
import 'primevue/resources/themes/lara-light-teal/theme.css'
import './assets/main.css'
import Button from "primevue/button";
import InputText from "primevue/inputtext";

const app = createApp(App)

app.use(PrimeVue);
app.use(router)
app.use(store)
app.component('Button', Button);
app.component('InputText', InputText);


app.mount('#app')
