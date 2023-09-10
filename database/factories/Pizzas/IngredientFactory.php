<?php

namespace Database\Factories\Pizzas;

use App\Models\Pizzas\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizzas\Ingredient>
 */
class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    public function definition(): array
    {
        return [
            'slug'      => $this->faker->slug,
            'title'     => $this->faker->name,
        ];
    }
}
