<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'id_buku',
        'kode_buku',
        'judul_buku',
        'cover',
        'deskripsi',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'jumlah_salinan_tersedia',
        'rak',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_buku', 'id_buku');
    }
}
