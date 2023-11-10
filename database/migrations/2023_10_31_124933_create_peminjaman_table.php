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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->integer('id_anggota');
            $table->integer('id_buku');
            $table->integer('id_petugas');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_jatuh_tempo');
            $table->string('status')->default('On Process'); // Status defaultnya On Process
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
