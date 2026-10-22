<?php

namespace Database\Factories;

use App\Models\Kantin;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_kantin' => Kantin::factory(),
            'nama_menu' => fake()->randomElement(['Nasi Goreng', 'Mie Ayam', 'Bakso', 'Es Teh', 'Es Jeruk']),
            'kategori' => fake()->randomElement(['Makanan', 'Minuman']),
            'harga' => fake()->numberBetween(2, 20) * 1000,
            'stok' => fake()->numberBetween(5, 50),
        ];
    }
}
