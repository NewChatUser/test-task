<script>
import axios from "axios";

export default {
    data() {
        return {
            pizzas: [],
            sizes: [],
        }
    },
    methods: {
        async addPizzaList() {
            try {
                const response = await axios.get('/api/pizza_lists');
                this.pizzas = response.data.map(pizza => ({
                    ...pizza,
                    selectedSizeId: 1,
                    quantity: 1,
                }));
            } catch (error) {
                console.error(error);
            }
        },
        async addSizeList() {
            try {
                const response = await axios.get('/api/size');
                this.sizes = response.data;
            } catch (error) {
                console.error(error);
            }
        },
        async addToBasket(pizzaId, sizeId, quantity) {
            try {
                const response = await axios.post(`/api/basket`, {
                    pizza_id: pizzaId,
                    size_id: sizeId,
                    quantity: quantity,
                });
                alert(response.data.message);
            } catch (error) {
                console.error(error)
            }
        },
        selectSize(pizza, size) {
            pizza.selectedSizeId = size.id; // Устанавливаем выбранный размер для данной пиццы
        },
        decrementQuantity(pizza) {
            if (pizza.quantity > 1) {
                pizza.quantity--;
            }
        },
        incrementQuantity(pizza) {
            pizza.quantity++;
        },
        calculatePrice(pizza) {
            const selectedSize = this.sizes.find(size => size.id === pizza.selectedSizeId);
            if (selectedSize) {
                return (parseFloat(pizza.price) * selectedSize.multiplier * pizza.quantity).toFixed(2);
            } else {
                return parseFloat(pizza.price).toFixed(2);
            }
        },

    },
    mounted() {
        this.addPizzaList();
        this.addSizeList();
    }
}
</script>

<template>
    <div class="pizza-list" v-for="pizza in pizzas" :key="pizza.id">
        <div class="pizza-card">
            <div class="card-name">{{ pizza.name }}</div>
            <div class="card"><strong>Ингредиенты:</strong> {{ pizza.ingredients.join(', ') }}</div>
            <div class="btn-group">
                <button
                    class="btn-size"
                    :class="{ selected: size.id === pizza.selectedSizeId }"
                    @click="selectSize(pizza, size)"
                    v-for="size in sizes"
                    :key="size.id"
                >
                    {{ size.name }}
                </button>
            </div>
            <div>
                <button class="btn-quantity" @click="decrementQuantity(pizza)">-</button>
                {{ pizza.quantity }}
                <button class="btn-quantity" @click="incrementQuantity(pizza)">+</button>
            </div>
            <div class="card"><strong>Цена:</strong> {{ calculatePrice(pizza) }}р
            </div>
        </div>
        <div class="pizza-add-to-cart">
            <button class="btn" @click="addToBasket(pizza.id, pizza.selectedSizeId, pizza.quantity)"> Добавить в
                корзину
            </button>
        </div>
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
    align-items: end;
    align-content: center;
    justify-content: center;
    padding: 10px 15px;
    background: none;
    border-radius: 10px;
    color: darkslateblue;
    border: 1px solid darkslateblue;
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

.btn-quantity {
    background-color: #ccc;
    color: #000;
    padding: 5px 10px;
    margin: 5px;
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
    display: -webkit-flex;
    align-items: center;
    justify-content: flex-end;
}
</style>
