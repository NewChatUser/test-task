<?php

namespace Database\Factories\Pizzas;

use App\Models\Pizzas\Ingredient;
use App\Models\Pizzas\Pizza;
use App\Models\Pizzas\PizzaList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizzas\PizzaList>
 */
class PizzaListFactory extends Factory
{
    protected $model = PizzaList::class;

    protected $pizza = Pizza::class;
    protected $ingredient = Ingredient::class;

    public function definition(): array
    {
        return [
            'slug'              => $this->faker->slug,
            'pizza_id'          => $this->pizza::get()->random()->id,
            'ingredients_id'    => $this->ingredient::get()->random()->id,
            'price'             => random_int(200, 500),
        ];
    }
}
