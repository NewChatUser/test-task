<?php

namespace App\Models\Pizzas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaList extends Model
{
    use HasFactory;

    protected $table = 'pizza_lists';
    protected $fillable = [];
}
