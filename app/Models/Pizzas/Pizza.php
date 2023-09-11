<?php

namespace App\Models\Pizzas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pizzas';

    protected $fillable = [
        'slug',
        'title',
        'price',
    ];

//    public function pizzaLists()
//    {
//        return $this->hasMany(PizzaList::class, 'pizza_id');
//    }
}
