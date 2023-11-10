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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('kode_buku')->unique();
            $table->string('judul_buku');
            $table->string('cover')->nullable(); // Kolom cover (file gambar)
            $table->text('deskripsi')->nullable(); // Kolom deskripsi
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->string('kategori');
            $table->integer('jumlah_salinan_tersedia');
            $table->string('rak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
