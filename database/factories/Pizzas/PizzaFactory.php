<?php

namespace Database\Factories\Pizzas;

use App\Models\Pizzas\Pizza;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizzas\Pizza>
 */
class PizzaFactory extends Factory
{
    protected $model = Pizza::class;

    public function definition(): array
    {
        return [
            'slug'      => $this->faker->slug,
            'title'     => $this->faker->name,
            'price'     => random_int(200, 500),
        ];
    }
}
