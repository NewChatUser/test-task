<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Orders\Order;
use App\Models\Pizzas\Pizza;
use App\Models\Pizzas\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderLists = Order::with('pizzas', 'sizes')->get();

        $orders = [];

        foreach ($orderLists as $ordertList) {
            $orderId = $ordertList->id;
            $pizzaName = $ordertList->pizzas->title;
            $pizzaSize = $ordertList->sizes->title;
            $orderDate = $ordertList->order_date;
            $quantity = $ordertList->quantity;
            $totalPrice = $ordertList->total_price;

            $orders[] = [
                'id' => $orderId,
                'name' => $pizzaName,
                'size' => $pizzaSize,
                'quantity' => $quantity,
                'total_price' => $totalPrice,
                'order_date' => $orderDate
            ];

        }

        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizzaId = $request->input('pizza_id');
        $sizeId = $request->input('size_id');
        $quantity = $request->input('quantity');
        $totalPrice =$request->input('total_price');

        Order::create([
            'pizza_id' => $pizzaId,
            'size_id' => $sizeId,
            'quantity' => $quantity,
            'total_price' => $totalPrice, // Учтите цену с учетом размера
            'order_date' => Date::now()
        ]);

        return response()->json(['message' => 'Пицца добавлена в заказ']);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('Order.list');
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
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Товар в корзине не найден'], 404);
        }

        // Удалите товар из заказа
        $order->delete();

        return response()->json(['message' => 'Товар успешно удален из корзины'], 200);
    }
}
