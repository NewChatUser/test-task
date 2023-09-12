<?php

use App\Http\Controllers\Baskets\BasketController;
use App\Http\Controllers\Pizzas\PizzaController;
use App\Http\Controllers\Pizzas\PizzaListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PizzaListController::class, 'show']);
Route::get('/basket', [BasketController::class, 'index']);
Route::get('/pizza', [PizzaController::class, 'index']);
