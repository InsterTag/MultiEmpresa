<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cart;

class CartFactory extends Factory
{
    protected $model = Cart::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'status' => 'pending',
        ];
    }
}
