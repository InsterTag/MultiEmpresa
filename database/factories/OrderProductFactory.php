<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderProduct;

class OrderProductFactory extends Factory
{
    protected $model = OrderProduct::class;
    public function definition(): array {
        return [
            'order_id' => 1,
            'product_id' => 1,
            'quantity' => $this->faker->numberBetween(1, 10),
            'unit_price' => $this->faker->randomFloat(2, 1000, 100000),
            'total' => $this->faker->randomFloat(2, 1000, 1000000),
        ];
    }
}
