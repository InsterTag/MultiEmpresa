<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CharacteristicCategoryProduct;
use App\Models\Product;
use App\Models\Category;
use App\Models\Characteristic;

class CharacteristicCategoryProductFactory extends Factory
{
    protected $model = CharacteristicCategoryProduct::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory(),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'characteristic_id' => Characteristic::inRandomOrder()->first()?->id ?? Characteristic::factory(),
        ];
    }
}
