<?php

namespace Database\Seeders\Pizza;

use App\Models\Pizzas\Pizzas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pizzas::factory()
            ->count(10)
            ->create();
    }
}
