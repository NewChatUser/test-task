<?php

namespace Database\Seeders\Pizzas;

use App\Models\Pizzas\Pizza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pizza::factory()
            ->count(10)
            ->create();
    }
}
