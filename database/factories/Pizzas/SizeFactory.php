<?php

namespace Database\Factories\Pizzas;

use App\Models\Pizzas\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizzas\Size>
 */
class SizeFactory extends Factory
{
    protected $model = Size::class;

    public function definition(): array
    {
        return [
            'slug'      => $this->faker->slug,
            'title'     => $this->faker->title,
            'markup'    => $this->faker->randomFloat(1, 1, 2),
        ];
    }
}
