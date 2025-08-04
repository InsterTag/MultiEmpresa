<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Branch;

class BranchFactory extends Factory
{
    protected $model = Branch::class;

    public function definition(): array {
        return [
            'company_id' => 1,
            'name' => $this->faker->company . ' Branch',
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->companyEmail,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
