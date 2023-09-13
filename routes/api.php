<?php

use App\Http\Controllers\Baskets\BasketController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Pizzas\PizzaListController;
use App\Http\Controllers\Pizzas\SizeController;
use Illuminate\Support\Facades\Route;

Route::resource('pizza_lists', PizzaListController::class);
Route::resource('basket', BasketController::class);
Route::resource('size', SizeController::class);
Route::resource('order', OrderController::class);
