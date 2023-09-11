<?php

namespace App\Http\Controllers\Pizzas;

use App\Http\Controllers\Controller;
use App\Models\Pizzas\PizzaList;


class PizzaListController extends Controller
{
    public function index()
    {
        return PizzaList::join('pizzas as p', 'pizza_lists.pizza_id', '=', 'p.id')
            ->join('ingredients as i', 'pizza_lists.ingredients_id', '=', 'i.id')
            ->select('p.title as pizza', 'i.title as ingredients', 'p.price')
            ->orderBy('p.title')
            ->get()
            ->toArray();
    }

    public function show()
    {
        return view('Pizza.list');
    }
}
