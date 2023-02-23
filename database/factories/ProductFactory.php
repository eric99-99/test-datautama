<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(3, true),
            'stock' => $this->faker->randomNumber(2, true),
            'description' =>  $this->faker->sentence(5),
            'created_at' => now()
        ];
    }
}
