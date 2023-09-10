<?php

namespace Database\Seeders\Pizzas;

use App\Models\Pizzas\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ingredient::factory()
            ->count(50)
            ->create();
    }
}
