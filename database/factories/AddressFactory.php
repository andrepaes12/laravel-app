<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'address' => fake()->streetAddress(),
            'address' => fake()->streetName(),
            // 'number' => fake()->randomNumber(4),
            'number' => rand(1, 100),
            'complement' => fake()->streetName(),
            'zipcode' => fake()->postcode(),
            'city' => fake()->city(),
            'state' => fake()->city(),
            'user_id' => fake()->randomElement(User::all()->pluck('id')->toArray()),
        ];
    }
}
