<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'iduser' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'produk' => Faker::create()->word,
            'jumlah' => fake()->numberBetween(0,5),
        ];
    }
}
