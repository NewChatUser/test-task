import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});


// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);

import PizzaList from "./components/PizzaList.vue";
app.component('pizza-list', PizzaList);

app.mount('#app');

