<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PaymentCard;

class PaymentCardFactory extends Factory
{
    protected $model = PaymentCard::class;
    public function definition(): array {
        return [
            'user_id' => 1,
            'card_number' => $this->faker->creditCardNumber,
            'holder_name' => $this->faker->name,
            'expiry' => $this->faker->creditCardExpirationDateString,
            'cvv' => $this->faker->numerify('###'),
            'card_type' => 'fake',
            'balance' => $this->faker->randomFloat(2, 100000, 1000000),
        ];
    }
}
