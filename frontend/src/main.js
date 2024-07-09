import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import 'eva-icons/style/eva-icons.css'; // Correct import for Eva Icons

const app = createApp(App);

app.use(router);

app.mount('#app');
