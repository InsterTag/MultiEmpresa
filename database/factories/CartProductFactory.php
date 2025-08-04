<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CartProduct;

class CartProductFactory extends Factory
{
    protected $model = CartProduct::class;
    public function definition(): array {
        return [
            'cart_id' => 1,
            'product_id' => 1,
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
