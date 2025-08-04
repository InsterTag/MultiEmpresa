<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array {
        return [
            'branch_id' => 1,
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->paragraph,
            'barcode' => $this->faker->ean13,
            'unit_price' => $this->faker->randomFloat(2, 1000, 500000),
            'media' => $this->faker->imageUrl,
            'state' => 'available'
        ];
    }
}
