<?php

namespace Database\Seeders\Pizzas;

use App\Models\Pizzas\PizzaList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PizzaList::factory()
            ->count(25)
            ->create();
    }
}
