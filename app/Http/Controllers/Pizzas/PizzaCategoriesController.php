<?php

namespace App\Http\Controllers\Pizzas;

use App\Http\Controllers\Controller;
use App\Models\Pizzas\PizzaCategories;
use Illuminate\Http\Request;

class PizzaCategoriesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $categories = PizzaCategories::all();
        dd($categories);
    }
}
