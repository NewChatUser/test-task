import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import PizzaList from "./components/PizzaList.vue";
app.component('pizza-list', PizzaList);

import Basket from "./components/Basket.vue";
app.component('basket', Basket);

app.mount('#app');

