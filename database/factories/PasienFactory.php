<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'jenis_hewan' => Faker::create()->word,
            'diagnosa' => Faker::create()->word,
            'foto' => 'https://pmi.is3.cloudhost.id/Coba_Upload/1705996422.jpg'
        ];
    }
}
