<?php

namespace App\Models\Pizzas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'ingredients';

    protected $fillable = [
        'slug',
        'title',
    ];

    public function pizzaLists()
    {
        return $this->hasMany(PizzaList::class, 'ingredients_id');
    }
}
