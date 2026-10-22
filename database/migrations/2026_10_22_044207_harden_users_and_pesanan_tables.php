<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password', 255)->change();
            $table->unique('username');
        });

        DB::table('users')->orderBy('id')->each(function (object $user) {
            if (! Hash::isHashed($user->password)) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['password' => Hash::make($user->password)]);
            }
        });

        Schema::table('pesanan', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('menu_id')->references('id_menu')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * Hashed passwords cannot be turned back into plain text, so the
     * password column is left at 255 characters.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['menu_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
        });
    }
};
