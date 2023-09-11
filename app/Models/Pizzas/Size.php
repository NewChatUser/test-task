<?php

namespace App\Models\Pizzas;

use App\Models\Baskets\Basket;
use App\Models\Orders\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'markup',
    ];

    public function baskets()
    {
        return $this->hasMany(Basket::class, 'size_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'size_id');
    }
}
