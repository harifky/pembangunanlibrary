<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $daftarPeminjaman = Peminjaman::all();
        $daftarBuku = Buku::all(); // Mengambil daftar buku dari tabel buku
        $daftarAnggota = Anggota::all(); // Mengambil daftar anggota dari tabel anggota
        $pengembalian = Pengembalian::all();
        return view('pengembalian.pengembalian', compact('pengembalian', 'daftarPeminjaman', 'daftarBuku', 'daftarAnggota'));
    }

    public function create(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'tanggal_pengembalian' => 'required',
        ]);

        // Temukan data peminjaman berdasarkan ID peminjaman
        $peminjaman = Peminjaman::find($request->id_peminjaman);

        // Hitung selisih hari antara tanggal_jatuh_tempo dan tanggal_pengembalian
        $tanggalJatuhTempo = new Carbon($peminjaman->tanggal_jatuh_tempo);
        $tanggalPengembalian = new Carbon($request->tanggal_pengembalian);
        $selisihHari = $tanggalPengembalian->diffInDays($tanggalJatuhTempo);

        // Tentukan status dan denda berdasarkan selisih hari
        $status = ($selisihHari > 0) ? 'Terlambat' : 'Tepat Waktu';
        $denda = ($selisihHari > 0) ? $selisihHari * 500 : 0;

        // Simpan data pengembalian ke database
        $pengembalian = new Pengembalian();
        $pengembalian->id_peminjaman = $request->id_peminjaman;
        $pengembalian->id_petugas = auth()->user()->id;
        $pengembalian->id_anggota = $request->id_anggota;
        $pengembalian->id_buku = $request->id_buku;
        $pengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;
        $pengembalian->denda = $denda;
        $pengembalian->status = $status;

        // Simpan perubahan ke database
        $pengembalian->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil disimpan.');
    }
}
