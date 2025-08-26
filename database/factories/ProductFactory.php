<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Company;
use App\Models\Branch;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array {
        return [
            'company_id' => Company::inRandomOrder()->first()->id ?? Company::factory(),
            'branch_id'  => Branch::inRandomOrder()->first()->id ?? Branch::factory(),
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->paragraph,
            'barcode' => $this->faker->ean13,
            'unit_price' => $this->faker->randomFloat(2, 1000, 500000),
            'media' => $this->faker->imageUrl,
            'state' => 'available'
        ];
    }
}
