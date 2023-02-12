<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoice' => Str::random(10),
            'package_id' => rand(1, 10),
            'qty' => rand(100, 1000),
            'type' => 'in',
            'consignee' => fake()->name(),
            'send' => fake()->date(),
            'platform' => fake()->word(),
            'airwaybill' => Str::random(17),
            'expedisi' => fake()->word(),
            'user_id' => rand(1, 10),
        ];
    }
}
