<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jurusan = fake()->randomElement(['RPL', 'DKV', 'TKJ']);

        return [
            'nis' => (string) fake()->unique()->numberBetween(2024000, 2024999),
            'nama' => fake()->name(),
            'kelas' => 'XI '.$jurusan.' '.fake()->numberBetween(1, 2),
            'jurusan' => $jurusan,
        ];
    }
}
