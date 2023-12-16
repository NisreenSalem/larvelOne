<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [

            'carTitle' => fake()->company(),
            'description' => fake()->text(),
            'published' => 1,
            'image' => fake()->imageUrl(600, 400),
            'price' => fake()->randomDigit(),
            'category_id' => fake()->numberBetween($min = 1, $max = 2),


        ];
    }
}
