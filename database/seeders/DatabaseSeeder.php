<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['username' => 'admin_kantin'],
            ['password' => 'admin123', 'role' => 'admin'],
        );

        User::firstOrCreate(
            ['username' => 'budi_siswa'],
            ['password' => '123', 'role' => 'siswa'],
        );
    }
}
