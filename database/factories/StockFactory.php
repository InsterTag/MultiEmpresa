<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Stock;

class StockFactory extends Factory
{
    protected $model = Stock::class;
    public function definition(): array {
        return [
            'product_id' => 1,
            'branch_id' => 1,
            'quantity' => $this->faker->numberBetween(5, 100),
        ];
    }
}
