<?php

namespace App\Models\Customers;

use App\Models\Baskets\Basket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'first_name',
        'last_name',
        'address',
        'phone_number',
    ];

    public function baskets()
    {
        return $this->hasMany(Basket::class, 'customer_id');
    }
}
