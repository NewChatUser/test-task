<?php

namespace App\Http\Controllers\Baskets;

use App\Http\Controllers\Controller;
use App\Models\Baskets\Basket;
use App\Models\Pizzas\Pizza;
use App\Models\Pizzas\Size;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $basketLists = Basket::with('pizzas', 'sizes')->get();

        $baskets = [];

        foreach ($basketLists as $basketList) {
            $basketId = $basketList->id;
            $pizzaId = $basketList->pizzas->id;
            $pizzaPrice = $basketList->pizzas->price;
            $pizzaName = $basketList->pizzas->title;
            $pizzaSize = $basketList->sizes->title;
            $sizeId = $basketList->sizes->id;
            $quantity = $basketList->quantity;
            $totalPrice = $basketList->total_price;

            $baskets[] = [
                'id' => $basketId,
                'pizza_id' => $pizzaId,
                'name' => $pizzaName,
                'size_id' => $sizeId,
                'size' => $pizzaSize,
                'quantity' => $quantity,
                'price' => $pizzaPrice,
                'total_price' => $totalPrice,
            ];

        }

        return response()->json($baskets);
    }

    public function store(Request $request)
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
        $totalPrice = floatval($pizza->price) * floatval($size->multiplier) * $quantity;
//        dd($price);
        // Добавьте пиццу с размером в корзину
        Basket::create([
            'pizza_id' => $pizzaId,
            'size_id' => $sizeId,
            'quantity' => $quantity,
            'total_price' => $totalPrice, // Учтите цену с учетом размера
        ]);

        return response()->json(['message' => 'Пицца добавлена в корзину']);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('Basket.list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Найдите заказ в корзине по его ID
        $basket = Basket::findOrFail($id);

        $pizzaId = $basket->pizza_id;

        // Получите параметры для обновления
        $newSizeId = request('size_id');
        $newQuantity = request('quantity');

        // Проверьте, существует ли пицца с указанным ID
        $pizza = Pizza::find($pizzaId);

        if (!$pizza) {
            return response()->json(['message' => 'Пицца не найдена'], 404);
        }

        // Проверьте, существует ли размер с указанным ID
        $size = Size::find($newSizeId);

        if (!$size) {
            return response()->json(['message' => 'Размер не найден'], 404);
        }

        $totalPrice = floatval($pizza->price) * floatval($size->multiplier) * $newQuantity;

        // Обновите заказ в базе данных
        $basket->update([
            'size_id' => $newSizeId,
            'quantity' => $newQuantity,
            'total_price' => $totalPrice
            // Другие поля, которые вы хотите обновить
        ]);

        // Отправьте успешный ответ или сообщение
        return response()->json(['message' => 'Заказ в корзине успешно обновлен']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $basket = Basket::find($id);

        if (!$basket) {
            return response()->json(['message' => 'Товар в корзине не найден'], 404);
        }

        // Удалите товар из корзины
        $basket->delete();

        return response()->json(['message' => 'Товар успешно удален из корзины'], 200);
    }
}
