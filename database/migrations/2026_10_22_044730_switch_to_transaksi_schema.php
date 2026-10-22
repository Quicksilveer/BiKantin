<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Use the existing transaksi + detail_transaksi tables for orders instead of
 * the pesanan table, and link login accounts to the siswa table.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('pesanan');

        Schema::table('users', function (Blueprint $table) {
            $table->string('nis', 10)->nullable()->unique()->after('role');

            $table->foreign('nis')->references('nis')->on('siswa');
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('status', 30)->default('Menunggu Konfirmasi')->after('metode_bayar');
        });

        DB::table('transaksi')->update(['status' => 'Selesai']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['nis']);
            $table->dropUnique(['nis']);
            $table->dropColumn('nis');
        });

        Schema::create('pesanan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('menu_id');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->string('status', 100)->nullable()->default('Menunggu Konfirmasi');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('menu_id')->references('id_menu')->on('menu');
        });
    }
};
