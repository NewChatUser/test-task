<?php

namespace App\Http\Controllers\Pizzas;

use App\Models\Pizzas\Pizzas;
use Illuminate\Routing\Controller;

class PizzasController extends Controller
{
    public function index()
    {
        $categories = Pizzas::all();
        dd($categories);
    }
}
