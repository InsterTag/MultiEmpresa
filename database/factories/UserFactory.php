<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;


class UserFactory extends Factory {
    protected $model = User::class;

    public function definition(): array {
        return [
            'name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'document_type' => $this->faker->randomElement(['CC', 'TI', 'CE', 'TE']),
            'document' => $this->faker->unique()->numerify('##########'),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'username' => $this->faker->unique()->userName,
            'remember_token' => Str::random(10),
        ];
    }



























    // protected static ?string $password;

    // public function definition(): array
    // {
    //     return [
    //         'name' => fake()->name(),
    //         'email' => fake()->unique()->safeEmail(),
    //         'email_verified_at' => now(),
    //         'password' => static::$password ??= Hash::make('password'),
    //         'remember_token' => Str::random(10),
    //     ];
    // }

    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
