<?php

namespace App\Models\Orders;

use App\Models\Customers\Customer;
use App\Models\Pizzas\PizzaList;
use App\Models\Pizzas\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'pizza_list_id',
        'size_id',
        'quantity',
        'total_price',
        'customer_id',
        'order_date',
        'status_id',
    ];

    public function pizzaList()
    {
        return $this->belongsTo(PizzaList::class, 'pizza_list_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
