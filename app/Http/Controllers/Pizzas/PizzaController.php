<?php

namespace App\Http\Controllers\Pizzas;

use App\Http\Controllers\Controller;
use App\Models\Pizzas\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        $pizza = Pizza::all();
    }
}
