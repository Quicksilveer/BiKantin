<?php

namespace Tests\Feature;

use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DatabaseSetupTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeder_creates_test_accounts_with_hashed_passwords(): void
    {
        $this->seed();

        $admin = User::where('username', 'admin_kantin')->firstOrFail();
        $siswa = User::where('username', 'budi_siswa')->firstOrFail();

        $this->assertTrue($admin->isAdmin());
        $this->assertFalse($siswa->isAdmin());
        $this->assertTrue(Hash::check('admin123', $admin->password));
        $this->assertTrue(Hash::check('123', $siswa->password));
    }

    public function test_username_must_be_unique(): void
    {
        User::factory()->create(['username' => 'budi_siswa']);

        $this->expectException(QueryException::class);

        User::factory()->create(['username' => 'budi_siswa']);
    }

    public function test_pesanan_belongs_to_user_and_menu(): void
    {
        $user = User::factory()->create();
        $menu = $this->createMenu();

        $pesanan = Pesanan::create([
            'user_id' => $user->id,
            'menu_id' => $menu->id_menu,
            'jumlah' => 2,
            'total_harga' => 30000,
        ])->refresh();

        $this->assertSame('Menunggu Konfirmasi', $pesanan->status);
        $this->assertTrue($pesanan->user->is($user));
        $this->assertTrue($pesanan->menu->is($menu));
        $this->assertCount(1, $user->pesanan);
        $this->assertCount(1, $menu->pesanan);
    }

    public function test_pesanan_rejects_unknown_menu(): void
    {
        $user = User::factory()->create();

        $this->expectException(QueryException::class);

        Pesanan::create([
            'user_id' => $user->id,
            'menu_id' => 999,
            'jumlah' => 1,
            'total_harga' => 15000,
        ]);
    }

    private function createMenu(): Menu
    {
        $idKantin = DB::table('kantin')->insertGetId([
            'nama_kantin' => 'Kantin Bu Sari',
            'penanggung_jawab' => 'Sari Wulandari',
        ], 'id_kantin');

        return Menu::create([
            'id_kantin' => $idKantin,
            'nama_menu' => 'Nasi Goreng Spesial',
            'kategori' => 'Makanan',
            'harga' => 15000,
            'stok' => 10,
        ]);
    }
}
