<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['L', 'M']);

        return [
            'user_id' => fake()->unique()->numberBetween(1, 10000), // Optional if auto-increment is preferred
            'user_name' => fake()->name($gender == 'L' ? 'male' : 'female'),
            'user_email' => fake()->unique()->safeEmail(),
            'user_password' => bcrypt('password'), // Default password
            'user_gender' => $gender,
            'user_phone' => fake()->unique()->numerify('08##########'),
            'user_address' => fake()->address(),
            'user_profile' => null, // or provide fake image path
            'user_role' => fake()->randomElement(['user', 'super_admin', 'admin_event', 'admin_product']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn(array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
