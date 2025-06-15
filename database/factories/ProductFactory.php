<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => 'PRD' . strtoupper(Str::random(7)),
            'product_name' => $this->faker->words(3, true),
            'product_description' => $this->faker->paragraph,
            'product_price' => $this->faker->randomFloat(2, 1000, 100000),
            'product_stock' => $this->faker->numberBetween(0, 100),
            'product_category' => $this->faker->word,
            'product_image' => $this->faker->imageUrl(640, 480, 'product'),
            'product_min_order' => $this->faker->numberBetween(1, 5),
            'product_tags' => implode(',', $this->faker->words(3)),
        ];
    }
}
