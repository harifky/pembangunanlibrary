<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id('id_anggota');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama_anggota');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->date('tanggal_bergabung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
