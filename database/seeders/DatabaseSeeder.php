<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Pizzas\IngredientSeeder;
use Database\Seeders\Pizzas\PizzaListSeeder;
use Database\Seeders\Pizzas\PizzaSeeder;
use Database\Seeders\Pizzas\SizeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $this->call(PizzaSeeder::class);
//        $this->call(IngredientSeeder::class);
//        $this->call(PizzaListSeeder::class);
        $this->call(SizeSeeder::class);
    }

}
