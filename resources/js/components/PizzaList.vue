<script>
    import axios from "axios";
    export default {
        data() {
            return {
                pizzas: {
                    title: '',
                }
            }
        },
         async created() {
            try {
                const response = await axios.get('/api/pizza_lists');
                this.pizzas = response.data;
            } catch (error) {
                console.error(error);
            }
         }
    }
</script>

<template>
    <div class="post" v-for="pizza in pizzas">
        <div><strong>Название:</strong> {{ pizza.title }}</div>
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
}
</style>
