<?php

namespace App\Models\Orders;

use App\Models\Pizzas\Pizza;
use App\Models\Pizzas\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'pizza_id',
        'size_id',
        'quantity',
        'total_price',
        'order_date',
        'status_id',
    ];

    public function pizzas()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
