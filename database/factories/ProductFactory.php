<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'unit' => 'unidad',
            'price' => 1000,
            'stock' => 10,
            'stock_min' => 3,
            'active' => 1,
        ];
    }
}
