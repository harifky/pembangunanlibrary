<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $primaryKey = 'id_pengembalian';

    protected $fillable = [
        'id_peminjaman',
        'id_petugas',
        'id_anggota',
        'tanggal_pengembalian',
        'denda',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman', 'id_peminjaman');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_petugas', 'id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }
}
