<?php

namespace Database\Seeders;

use App\Models\Siswa;
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
        Siswa::firstOrCreate(
            ['nis' => '2024101'],
            ['nama' => 'Budi Santoso', 'kelas' => 'XI RPL 1', 'jurusan' => 'RPL'],
        );

        User::firstOrCreate(
            ['username' => 'admin_kantin'],
            ['password' => 'admin123', 'role' => 'admin'],
        );

        User::firstOrCreate(
            ['username' => 'budi_siswa'],
            ['password' => '123', 'role' => 'siswa', 'nis' => '2024101'],
        );
    }
}
