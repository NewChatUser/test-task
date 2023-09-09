<?php

namespace Database\Factories\Pizzas;

use App\Models\Pizzas\PizzaCategories;
use App\Models\Pizzas\Pizzas;
use Illuminate\Database\Eloquent\Factories\Factory;

class PizzasFactory extends Factory
{
    protected $model = Pizzas::class;
    protected $pizza_categories = PizzaCategories::class;

    public function definition(): array
    {
        return [
            'category_id' => $this->pizza_categories::get()->random()->id,
            'slug' => $this->faker->slug,
            'title' => $this->faker->name,
        ];
    }
}
