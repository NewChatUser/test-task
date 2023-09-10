<?php

namespace Database\Factories\Customers;

use App\Models\Customers\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'slug'          => $this->faker->slug,
            'first_name'    => $this->faker->firstName,
            'last_name'     => $this->faker->lastName,
            'address'       => $this->faker->address,
            'phone_number'  => $this->faker->phoneNumber
        ];
    }
}
