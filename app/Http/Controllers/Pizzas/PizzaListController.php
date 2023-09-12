<?php

namespace App\Http\Controllers\Pizzas;

use App\Http\Controllers\Controller;
use App\Models\Pizzas\PizzaList;


class PizzaListController extends Controller
{
    public function index()
    {
        // Получите список всех пицц с ингредиентами и ценой
        $pizzaLists = PizzaList::with('pizzas', 'ingredients')->get();

        // Создайте массив для хранения пицц
        $pizzas = [];

        // Обработайте результаты и сгруппируйте их по пиццам
        foreach ($pizzaLists as $pizzaList) {
            $pizzaName = $pizzaList->pizzas->title;
            $ingredientName = $pizzaList->ingredients->title;
            $price = $pizzaList->pizzas->price;

            // Проверьте, существует ли пицца в массиве, и создайте новую, если нет
            $foundPizza = null;
            foreach ($pizzas as &$pizza) {
                if ($pizza['name'] === $pizzaName) {
                    $foundPizza = $pizza;
                    break;
                }
            }

            if (!$foundPizza) {
                $pizzas[] = [
                    'name' => $pizzaName,
                    'price' => $price,
                    'ingredients' => [],
                ];
            }

            // Добавьте ингредиент к соответствующей пицце
            foreach ($pizzas as &$pizza) {
                if ($pizza['name'] === $pizzaName) {
                    $pizza['ingredients'][] = $ingredientName;
                    break;
                }
            }
        }

        return response()->json($pizzas);
    }

    public function show()
    {
        return view('Pizza.list');
    }
}
