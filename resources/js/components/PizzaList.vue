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
        },
        async addToBasket(pizzaId) {
            try {
                console.log(pizzaId);
                const response = await axios.post(`/api/basket`, {
                    pizza_id: pizzaId,
                    quantity: 1,
                    size_id: 1,
                });

                alert(response.data.message);
            } catch (error) {
                console.error(error)
            }

        }
    },
    mounted() {
        this.index();
    }
}
</script>

<template>
    <div class="pizza-list" v-for="pizza in pizzas">
        <div class="card-name">{{ pizza.name }}</div>
        <div class="card"><strong>Ингридиенты:</strong> {{ pizza.ingredients.join(', ') }}</div>
        <div class="card"><strong>Цена:</strong> {{ pizza.price }}р</div>
        <button class="btn" @click="addToBasket(pizza.id)"> Добавить в корзину</button>
    </div>
</template>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.pizza-list {
    margin: 10px;
    padding: 10px;
    border: 2px solid darkslateblue;
    border-radius: 10px;
}

.card-name {
    margin-top: 5px;
    font-size: 32px;
    font-weight: bold;
}

.btn {
    margin-top: 5px;
    display: -webkit-flex;
    align-items: end;
    padding: 10px 15px;
    background: none;
    border-radius: 10px;
    color: darkslateblue;
    border: 1px solid darkslateblue;
}
</style>
