<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Invoice;
use Illuminate\Support\Str;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;
    public function definition(): array {
        return [
            'order_id' => 1,
            'user_id' => 1,
            'invoice_number' => strtoupper(Str::random(10)),
            'invoice_date' => $this->faker->date(),
            'payment_method' => 'fake_card',
            'total' => $this->faker->randomFloat(2, 10000, 1000000),
        ];
    }
}
