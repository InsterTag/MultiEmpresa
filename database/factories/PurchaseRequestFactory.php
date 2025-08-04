<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PurchaseRequest;

class PurchaseRequestFactory extends Factory
{
    protected $model = PurchaseRequest::class;
    public function definition(): array {
        return [
            'branch_id' => 1,
            'warehouse_id' => 1,
            'product_id' => 1,
            'description' => $this->faker->sentence,
            'request_date' => $this->faker->date(),
            'status' => 'pending',
        ];
    }
}
