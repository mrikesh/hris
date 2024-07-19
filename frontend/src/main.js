import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import 'eva-icons/style/eva-icons.css'; 

import PrimeVue from 'primevue/config';

// Import PrimeVue CSS files// Choose your theme// Core CSS
import 'primeicons/primeicons.css'; // Icons
import 'primeflex/primeflex.css'; // PrimeFlex CSS Correct import for Eva Icons


const app = createApp(App);

app.use(router);

app.use(PrimeVue);

app.mount('#app');
