<script>
import axios from "axios";

export default {
    data() {
        return {
            baskets: [],
            sizes: [],
            selectedSize: {
                id: null,
                multiplier: 1,
            },
            quantity: 0,
        };
    },
    methods: {
        async addBasketList() {
            try {
                const response = await axios.get('/api/basket');
                console.log(response.data)
                this.baskets = response.data;
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
        async removeFromBasket(basketId) {
            try {
                await axios.delete(`/api/basket/${basketId}`);
                // Удаление элемента из массива baskets по basketId
                this.baskets = this.baskets.filter((basket) => basket.id !== basketId);
            } catch (error) {
                console.error(error);
            }
        },
        selectSize(size) {
            this.selectedSize.id = size.id;
            this.selectedSize.multiplier = size.multiplier;
        },
        calculatePrice(pizza) {
            if (this.selectedSize.id) {
                return (parseFloat(pizza.price) * this.selectedSize.multiplier).toFixed(2); // Округляем до двух знаков после запятой
            } else {
                return parseFloat(pizza.price).toFixed(2);
            }
        },
    },
    mounted() {
        this.addBasketList();
        this.addSizeList();
    }
}
</script>

<template>
    <div class="basket" v-for="basket in baskets">
        <div>
            <div class="card-name">{{ basket.name }}</div>

            <div class="btn-group">
                <button
                    class="btn-size"
                    :class="{ selected: size.id === selectedSize.id }"
                    @click="selectSize(size)"
                    v-for="size in sizes"
                    :key="size.id"
                >
                    {{ size.name }}
                </button>
            </div>
            <div><strong>Колличество:</strong> {{ basket.quantity }}</div>
            <div><strong>Цена:</strong> {{ basket.total_price }}</div>
        </div>
        <div class="pizza-add-to-cart">
            <button class="btn">Офрмить заказ</button>
            <button class="btn" @click="removeFromBasket(basket.id)">Удалить из корзины</button>
        </div>
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
    display: -webkit-flex;
    align-items: center;
    justify-content: space-between;
}

.card-name {
    font-size: 32px;
    font-weight: bold;
}

.btn {
    margin-top: 5px;
    display: -webkit-flex;
    align-content: center;
    padding: 10px 15px;
    background: none;
    border-radius: 10px;
    color: darkslateblue;
    border: 1px solid darkslateblue;
    width: 250px;
    font-size: 20px;
    font-weight: bold;
}

.btn-size {
    background-color: #ccc;
    color: #000;
    padding: 5px 10px;
    margin-top: 5px;
    margin-bottom: 5px;
    margin-right: 5px;
    border: none;
    cursor: pointer;
    border-radius: 10px;
}

.selected {
    /* Стили для выбранной кнопки размера */
    background-color: darkslateblue;
    color: #fff;
    border-radius: 10px;
}

.pizza-card {
    display: block;
    align-items: center;
    justify-content: flex-start;
}

.pizza-add-to-cart {
    display: block;
    align-items: center;
    justify-content: flex-end;
}
</style>
