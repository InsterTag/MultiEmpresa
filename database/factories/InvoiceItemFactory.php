<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\InvoiceItem;

class InvoiceItemFactory extends Factory
{
    protected $model = InvoiceItem::class;
    public function definition(): array {
        return [
            'invoice_id' => 1,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->numberBetween(1, 10),
            'unit_price' => $this->faker->randomFloat(2, 1000, 100000),
            'total' => $this->faker->randomFloat(2, 1000, 1000000),
        ];
    }
}
