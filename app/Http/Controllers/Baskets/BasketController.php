<?php

namespace App\Http\Controllers\Baskets;

use App\Http\Controllers\Controller;
use App\Models\Baskets\Basket;
use App\Models\Pizzas\Pizza;
use App\Models\Pizzas\Size;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addToBasket(Request $request)
    {
        $pizzaId = $request->input('pizza_id');
        $sizeId = $request->input('size_id');
        $quantity = $request->input('quantity');

        // Проверьте, существует ли пицца с указанным ID
        $pizza = Pizza::find($pizzaId);

        if (!$pizza) {
            return response()->json(['message' => 'Пицца не найдена'], 404);
        }

        // Проверьте, существует ли размер с указанным ID
        $size = Size::find($sizeId);

        if (!$size) {
            return response()->json(['message' => 'Размер не найден'], 404);
        }

        // Вычислите цену с учетом множителя размера
        $price = $pizza->price * $size->multiplier;

        // Добавьте пиццу с размером в корзину
        Basket::create([
            'pizza_id' => $pizzaId,
            'size_id' => $sizeId,
            'quantity' => $quantity,
            'price' => $price, // Учтите цену с учетом размера
        ]);

        return response()->json(['message' => 'Пицца добавлена в корзину']);
    }

    public function show() {
        return view('Basket.list');
    }
}
