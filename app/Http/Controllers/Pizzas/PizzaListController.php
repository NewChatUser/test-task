<?php

namespace App\Http\Controllers\Pizzas;

use App\Http\Controllers\Controller;
use App\Models\Baskets\Basket;
use App\Models\Pizzas\Pizza;
use App\Models\Pizzas\PizzaList;
use App\Models\Pizzas\Size;
use Illuminate\Http\Request;


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
            $pizzaId = $pizzaList->pizzas->id;
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
                    'id' => $pizzaId,
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
