<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_anggota',
        'id_buku',
        'id_petugas',
        'tanggal_peminjaman',
        'tanggal_jatuh_tempo',
        'status',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_petugas', 'id');
    }
}
