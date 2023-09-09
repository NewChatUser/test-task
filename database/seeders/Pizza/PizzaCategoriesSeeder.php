<?php

namespace Database\Seeders\Pizza;

use App\Models\Pizzas\PizzaCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PizzaCategories::factory()
            ->count(5)
            ->create();
    }
}
