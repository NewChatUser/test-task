import './bootstrap';
import {createApp} from 'vue';

const app = createApp({});

import PizzaList from "./components/PizzaList.vue";
app.component('vue-pizza-list', PizzaList);
import Basket from "./components/Basket.vue";
app.component('vue-basket', Basket);
import Order from "./components/Order.vue";
app.component('vue-order', Order);
import PageNavBar from "./components/PageNavBar.vue";
app.component('vue-page-navbar', PageNavBar);


app.mount('#app');

