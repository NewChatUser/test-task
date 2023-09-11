<?php

namespace App\Models\Pizzas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaList extends Model
{
    use HasFactory;

    protected $table = 'pizza_lists';

    protected $fillable = [
        'slug',
        'pizza_id',
        'ingredients_id',
    ];

    public function pizzas()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id');
    }

    public function ingredients()
    {
        return $this->belongsTo(Ingredient::class, 'ingredients_id');
    }
}
