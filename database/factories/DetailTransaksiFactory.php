<?php

namespace Database\Factories;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DetailTransaksi>
 */
class DetailTransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jumlah = fake()->numberBetween(1, 3);
        $harga = fake()->numberBetween(2, 20) * 1000;

        return [
            'id_transaksi' => Transaksi::factory(),
            'id_menu' => Menu::factory(),
            'jumlah' => $jumlah,
            'harga_saat_transaksi' => $harga,
            'subtotal' => $jumlah * $harga,
        ];
    }
}
