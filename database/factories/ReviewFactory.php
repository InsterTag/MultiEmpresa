<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;

class ReviewFactory extends Factory
{
    protected $model = Review::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'product_id' => 1,
            'description' => $this->faker->sentence,
            'rating' => $this->faker->numberBetween(1, 5),
            'average' => $this->faker->randomFloat(2, 1, 5)
        ];
    }
}
