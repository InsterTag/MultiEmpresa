<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class OrderFactory extends Factory
{
    protected $model = Order::class;
    public function definition(): array {
        return [
            'cart_id' => 1,
            'user_id' => 1,
            'payment_card_id' => 1,
            'total' => $this->faker->randomFloat(2, 10000, 500000),
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
        ];
    }
}
