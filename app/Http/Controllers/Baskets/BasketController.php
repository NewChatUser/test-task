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
            $pizzaName = $basketList->pizzas->title;
            $pizzaSize = $basketList->sizes->title;
            $quantity = $basketList->quantity;
            $totalPrice = $basketList->total_price;

            $baskets[] = [
                'name' => $pizzaName,
                'size' => $pizzaSize,
                'quantity' => $quantity,
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
        $totalPrice = floatval($pizza->price) * floatval($size->multiplier);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
