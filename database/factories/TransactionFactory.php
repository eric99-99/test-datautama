<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference_number' => $this->faker->name(),
            'price' => $this->faker->randomNumber(5, true),
            'quantity' => $this->faker->randomNumber(2, true),
            'price' => $this->faker->randomNumber(5, true),
            'payment_amount' =>  $this->faker->randomNumber(6, true),
            'product_id' => function () {
                return \App\Models\Product::factory();
            },
            'created_at' => now()
        ];
    }
}
