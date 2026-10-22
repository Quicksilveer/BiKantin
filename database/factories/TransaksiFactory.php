<?php

namespace Database\Factories;

use App\Models\Kantin;
use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => Siswa::factory(),
            'id_kantin' => Kantin::factory(),
            'tanggal' => now(),
            'metode_bayar' => fake()->randomElement(['Tunai', 'QRIS']),
            'status' => Transaksi::STATUS_MENUNGGU,
        ];
    }

    /**
     * Indicate that the order has been completed.
     */
    public function selesai(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => Transaksi::STATUS_SELESAI,
        ]);
    }
}
