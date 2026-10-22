<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Baseline of the existing db_bikantin schema, so the database can be
 * rebuilt from scratch with `php artisan migrate`.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kantin', function (Blueprint $table) {
            $table->integer('id_kantin', true);
            $table->string('nama_kantin', 100)->unique();
            $table->string('penanggung_jawab', 100);
        });

        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nis', 10)->primary();
            $table->string('nama', 100);
            $table->string('kelas', 20);
            $table->string('jurusan', 20);
        });

        Schema::create('menu', function (Blueprint $table) {
            $table->integer('id_menu', true);
            $table->integer('id_kantin');
            $table->string('nama_menu', 100);
            $table->string('kategori', 30);
            $table->decimal('harga', 12, 2);
            $table->integer('stok')->default(0);

            $table->foreign('id_kantin')->references('id_kantin')->on('kantin');
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->integer('id_transaksi', true);
            $table->string('nis', 10);
            $table->integer('id_kantin');
            $table->dateTime('tanggal')->useCurrent();
            $table->string('metode_bayar', 20);

            $table->foreign('nis')->references('nis')->on('siswa');
            $table->foreign('id_kantin')->references('id_kantin')->on('kantin');
        });

        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->integer('id_detail', true);
            $table->integer('id_transaksi');
            $table->integer('id_menu');
            $table->integer('jumlah');
            $table->decimal('harga_saat_transaksi', 12, 2);
            $table->decimal('subtotal', 12, 2);

            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
            $table->foreign('id_menu')->references('id_menu')->on('menu');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username', 50);
            $table->string('password', 50);
            $table->enum('role', ['admin', 'siswa']);
        });

        Schema::create('pesanan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('menu_id');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->string('status', 100)->nullable()->default('Menunggu Konfirmasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
        Schema::dropIfExists('users');
        Schema::dropIfExists('detail_transaksi');
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('menu');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('kantin');
    }
};
