<script>
export default {
    data() {
        return {
            links: [
                {
                    title: 'Главная',
                    href: '/',
                },
                {
                    title: 'Корзина',
                    href: '/basket',
                },
                {
                    title: 'Заказ',
                    href: '/order',
                }
            ]
        };
    }
}
</script>

<template>
    <nav class="navbar">
        <div class="navbar-center">
            <ul class="navbar-nav">
                <li class="nav-active" v-for="link in links">
                    <a class="nav-link" :href="link.href"> {{ link.title }}</a>
                </li>

            </ul>
        </div>
    </nav>
</template>

<style>
.navbar {
    margin: 10px;
    padding: 10px;
    border: 2px solid darkslateblue;
    border-radius: 10px;
}

.navbar-nav {
    font-size: 25px;
    display: -webkit-flex;
    align-items: center;
    justify-content: center;
}

.nav-active {
    padding: 10px;
    list-style-type: none;
}

.nav-link {
    text-decoration: none;
}
</style>
