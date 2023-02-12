<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Packages>
 */
class PackagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $name = fake()->name(),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'stock' => rand(1000, 9999),
            'box_number' => rand(1, 100),
            'size' => rand(1, 10),
            'color' => fake()->colorName(),
            'account' => fake()->creditCardNumber(),
        ];
    }
}
