<?php

namespace Database\Factories\Pizzas;

use App\Models\Pizzas\PizzaCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=PizzaCategories>
 */
class PizzaCategoriesFactory extends Factory
{
    protected $model = PizzaCategories::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->text(10),
        ];
    }
}
