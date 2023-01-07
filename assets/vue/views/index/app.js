import { createApp } from 'vue';
import urlShortener from '@/views/index/url-shortener.vue';

import '@/../styles/app.css';

const app = createApp({});

app.component('url-shortener', urlShortener);
app.mount('#app');
