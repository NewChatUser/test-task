<?php

namespace App\Models\Pizzas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaCategories extends Model
{
    use HasFactory;

    protected $table = 'pizza_categories';
    protected $fillable = [];
}
