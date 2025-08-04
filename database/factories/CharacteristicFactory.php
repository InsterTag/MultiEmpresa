<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Characteristic;

class CharacteristicFactory extends Factory
{
    protected $model = Characteristic::class;

    public function definition(): array {
        return [
            'name' => $this->faker->word,
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'size' => $this->faker->word,
            'color' => $this->faker->word,
            'size_cloth' => $this->faker->word,
            'material' => $this->faker->word,
            'dimensions' => $this->faker->word,
            'origin' => $this->faker->country,
        ];
    }
}
