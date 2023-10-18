<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seller;

class SaleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'seller_id' => Seller::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'commission' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
