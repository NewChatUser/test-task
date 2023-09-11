<?php

namespace App\Models\Pizzas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PizzaList extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pizza_lists';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pizza_id',
        'ingredients_id',
    ];

    public function pizza(): HasMany
    {
        return $this->hasMany(Pizza::class, 'pizza_id', 'id');
    }

    public function ingredient(): HasMany
    {
        return $this->hasMany(Ingredient::class, 'ingredients_id', 'id');
    }
}
