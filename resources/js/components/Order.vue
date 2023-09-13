<script>
import axios from "axios";

export default {
    data() {
        return {
            orders: []
        };
    },
    methods: {
        async addOrderList() {
            try {
                const response = await axios.get('/api/order');
                console.log(response.data)
                this.orders = response.data;
            } catch (error) {
                console.error(error);
            }
        },
        async removeFromBasket(orderId) {
            try {
                await axios.delete(`/api/order/${orderId}`);
                this.orders = this.orders.filter((order) => order.id !== orderId);
            } catch (error) {
                console.error(error);
            }
        },
    },
    mounted() {
        this.addOrderList();
    }
}
</script>

<template>
    <div class="order-list" v-for="order in orders">
        <div class="order-card">
            <div class="card-name">{{ order.name }}</div>
            <div class="card"><strong>Размер:</strong> {{ order.size }}</div>
            <div><strong>Количество:</strong> {{ order.quantity }}</div>
            <div class="card"><strong>Цена:</strong> {{ order.total_price }}р</div>
        </div>
        <div class="cancel-order">
            <button class="btn" @click="removeFromBasket(order.id)"> Отменить заказ</button>
        </div>
    </div>
</template>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.order-list {
    margin: 10px;
    padding: 10px;
    border: 2px solid darkslateblue;
    border-radius: 10px;
    display: -webkit-flex;
    align-items: center;
    justify-content: space-between;
}

.card-name {
    font-size: 32px;
    font-weight: bold;
}

.cancel-order {
    display: -webkit-flex;
    align-items: center;
    justify-content: flex-end;
}
</style>
