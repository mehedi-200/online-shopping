import { createApp } from 'vue';
import './bootstrap';
import router from "./vue/router/index.js";


const app = createApp({});
app.use(router);
app.mount('#app');

