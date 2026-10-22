<?php

namespace Database\Factories;

use App\Models\Kantin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kantin>
 */
class KantinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kantin' => 'Kantin '.fake()->unique()->firstName(),
            'penanggung_jawab' => fake()->name(),
        ];
    }
}
