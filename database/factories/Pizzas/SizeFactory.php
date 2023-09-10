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
            'title'     => '25cm',
            'markup'    => 1.0
        ];
    }
}
