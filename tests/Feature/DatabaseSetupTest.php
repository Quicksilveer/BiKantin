<?php

namespace Tests\Feature;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $this->assertNull($admin->siswa);
        $this->assertFalse($siswa->isAdmin());
        $this->assertSame('Budi Santoso', $siswa->siswa->nama);
        $this->assertTrue(Hash::check('admin123', $admin->password));
        $this->assertTrue(Hash::check('123', $siswa->password));
    }

    public function test_username_must_be_unique(): void
    {
        User::factory()->create(['username' => 'budi_siswa']);

        $this->expectException(QueryException::class);

        User::factory()->create(['username' => 'budi_siswa']);
    }

    public function test_transaksi_links_siswa_kantin_and_menu(): void
    {
        $user = User::factory()->create();
        $menu = Menu::factory()->create(['harga' => 15000]);

        $transaksi = Transaksi::factory()->create([
            'nis' => $user->nis,
            'id_kantin' => $menu->id_kantin,
        ])->refresh();

        DetailTransaksi::factory()->create([
            'id_transaksi' => $transaksi->id_transaksi,
            'id_menu' => $menu->id_menu,
            'jumlah' => 2,
            'harga_saat_transaksi' => 15000,
            'subtotal' => 30000,
        ]);

        $this->assertSame(Transaksi::STATUS_MENUNGGU, $transaksi->status);
        $this->assertTrue($transaksi->siswa->is($user->siswa));
        $this->assertTrue($transaksi->kantin->is($menu->kantin));
        $this->assertTrue($transaksi->detail->first()->menu->is($menu));
        $this->assertSame(30000.0, $transaksi->total());
        $this->assertCount(1, $user->siswa->transaksi);
    }

    public function test_detail_transaksi_rejects_unknown_menu(): void
    {
        $transaksi = Transaksi::factory()->create();

        $this->expectException(QueryException::class);

        DetailTransaksi::factory()->create([
            'id_transaksi' => $transaksi->id_transaksi,
            'id_menu' => 999,
        ]);
    }

    public function test_user_nis_must_exist_in_siswa(): void
    {
        $this->expectException(QueryException::class);

        User::factory()->create(['nis' => '9999999']);
    }
}
