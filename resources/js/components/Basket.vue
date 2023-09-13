<script>
import axios from "axios";

export default {
    data() {
        return {
            baskets: [],
        };
    },
    methods: {
        async index() {
            try {
                const response = await axios.get('/api/basket');
                console.log(response.data)
                this.baskets = response.data;
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
    <div class="basket" v-for="basket in baskets">
        <div><h1>{{ basket.name }}</h1></div>
        <div><strong>Размер:</strong> {{ basket.size }} </div>
        <div><strong>Колличество:</strong> {{ basket.quantity }} </div>
        <div><strong>Цена:</strong> {{ basket.total_price }}</div>
        <button class="btn">Офрмить заказ</button>
        <button class="btn">Удалить из корзины</button>
    </div>
</template>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.basket {
    margin: 10px;
    padding: 10px;
    border: 2px solid darkslateblue;
    border-radius: 10px;
}
</style>
