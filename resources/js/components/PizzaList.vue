<script>
import axios from "axios";

export default {
    data() {
        return {
            pizzas: []
        }
    },
    methods: {
        async index() {
            try {
                const response = await axios.get('/api/pizza_lists');
                console.log(response.data)
                this.pizzas = response.data;
            } catch (error) {
                console.error(error);
            }
        }
    },
    mounted() {
        this.index();
    }
}
</script>

<template>
    <div class="post" v-for="pizza in pizzas">
        <div><strong>{{ pizza.name }}</strong> </div>
        <div><strong>Ингридиенты:</strong> {{ pizza.ingredients.join(', ') }}</div>
        <div><strong>Цена:</strong> {{ pizza.price }}р</div>
        <button> Добавить в корзину </button>
    </div>
</template>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.post {
    margin: 10px;
    padding: 10px;
    border: 2px solid darkslateblue;
    border-radius: 10px;
}
</style>
