<?php

use App\Http\Controllers\Baskets\BasketController;
use App\Http\Controllers\Pizzas\PizzaListController;
use Illuminate\Support\Facades\Route;

Route::resource('pizza_lists', PizzaListController::class);
Route::resource('basket', BasketController::class);
