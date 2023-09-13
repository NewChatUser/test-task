<script>
import axios from "axios";

export default {
    data() {
        return {
            baskets: [],
            sizes: [],
        };
    },
    methods: {
        async addBasketList() {
            try {
                const response = await axios.get('/api/basket');
                console.log(response.data)
                this.baskets = response.data.map(basket => ({
                    ...basket,
                    selectedSizeId: basket.size_id,
                    quantity: basket.quantity,
                }));
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
        async updateBasket(basketId, newSizeId, newQuantity) {
            try {
                const response = await axios.put(`/api/basket/${basketId}`, {
                    size_id: newSizeId,
                    quantity: newQuantity,
                });
                alert(response.data.message);
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
        async placeOrder(basketId, pizzaId, sizeId, quantity, totalPrice) {
            try {
                const response = await axios.post('/api/order', {
                    pizza_id: pizzaId,
                    size_id: sizeId,
                    quantity: quantity,
                    total_price: totalPrice,
                });
                if (response.status === 200) {
                    // Очистить корзину или выполнить другие необходимые действия
                    this.removeFromBasket(basketId);
                    alert('Заказ успешно оформлен!');
                } else {
                    alert('Произошла ошибка при оформлении заказа.');
                }
            } catch (error) {
                console.error(error);
                alert('Произошла ошибка при оформлении заказа.');
            }
        },
        selectSize(basket, size) {
            if (size && size.id) {
                basket.selectedSizeId = size.id; // Устанавливаем выбранный размер для данной пиццы
            }
        },
        calculatePrice(basket) {
            const selectedSize = this.sizes.find(size => size.id === basket.selectedSizeId);
            console.log(basket.pizza_id.price)
            if (selectedSize) {
                return (parseFloat(basket.price) * selectedSize.multiplier * basket.quantity).toFixed(2);
            } else {
                return parseFloat(basket.price).toFixed(2);
            }
        },
        decrementQuantity(basket) {
            if (basket.quantity > 1) {
                basket.quantity--;
            }
        },
        incrementQuantity(basket) {
            basket.quantity++;
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
                    :class="{ selected: size.id === basket.selectedSizeId }"
                    @click="selectSize(basket, size), updateBasket(basket.id, size.id, basket.quantity)"
                    v-for="size in sizes"
                    :key="size.id"
                >
                    {{ size.name }}
                </button>
            </div>
            <div>
                <button class="btn-quantity" @click="decrementQuantity(basket), updateBasket(basket.id, basket.size_id, basket.quantity)">-</button>
                {{ basket.quantity }}
                <button class="btn-quantity" @click="incrementQuantity(basket), updateBasket(basket.id, basket.size_id, basket.quantity)">+</button>
            </div>
            <div><strong>Цена:</strong> {{ calculatePrice(basket) }}р</div>
        </div>
        <div class="pizza-add-to-cart">
            <button class="btn" @click="placeOrder(basket.id, basket.pizza_id, basket.size_id, basket.quantity, basket.total_price)">Офрмить заказ</button>
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

.pizza-add-to-cart {
    display: block;
    align-items: center;
    justify-content: flex-end;
}
</style>
