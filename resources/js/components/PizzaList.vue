<script>
import axios from "axios";

export default {
    data() {
        return {
            pizzas: [],
            sizes: [],
            quantity: 0,
        }
    },
    methods: {
        async addPizzaList() {
            try {
                const response = await axios.get('/api/pizza_lists');
                console.log(response.data)
                this.pizzas = response.data;
            } catch (error) {
                console.error(error);
            }
        },
        async addSizeList() {
            try {
                const response = await axios.get('/api/size');
                console.log(response.data);
                this.sizes = response.data;
            } catch (error) {
                console.error(error);
            }
        },
        async addToBasket(pizzaId, sizeId, quantity) {
            try {
                console.log(pizzaId);
                const response = await axios.post(`/api/basket`, {
                    pizza_id: pizzaId,
                    quantity: sizeId,
                    size_id: quantity,
                });
                alert(response.data.message);
            } catch (error) {
                console.error(error)
            }

        }
    },
    mounted() {
        this.addPizzaList();
        this.addSizeList();
    }
}
</script>

<template>
    <div class="pizza-list" v-for="pizza in pizzas">
        <div class="card-name">{{ pizza.name }}</div>
        <div class="card"><strong>Ингридиенты:</strong> {{ pizza.ingredients.join(', ') }}</div>

        <div class="btn-size" v-for="size in sizes">
            <input type="checkbox" v-model="sizes">
            <label>{{size.name}}</label>
        </div>
        <input type="number" v-model="quantity">
        <div class="card"><strong>Цена:</strong> {{ pizza.price }}р</div>

        <button class="btn" @click="addToBasket(pizza.id, sizes.id, quantity.value)"> Добавить в корзину</button>
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
.btn-size {
    margin-top: 5px;
    display: -webkit-flex;
}
</style>
