<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        $daftarBuku = Buku::all(); // Mengambil daftar buku dari tabel buku
        $daftarAnggota = Anggota::all(); // Mengambil daftar anggota dari tabel anggota
        return view('peminjaman.peminjaman', compact('peminjaman', 'daftarBuku', 'daftarAnggota'));
    }

    public function create(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'id_buku' => 'required',
            'id_anggota' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date',
            'status' => 'required',
        ]);

        // Buat instance Peminjaman dan isi dengan data dari form
        $peminjaman = new Peminjaman;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->id_anggota = $request->id_anggota;
        $peminjaman->id_petugas = auth()->user()->id; // ID petugas dari yang sedang login
        $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
        $peminjaman->tanggal_jatuh_tempo = $request->tanggal_jatuh_tempo;
        $peminjaman->status = $request->status;

        // Simpan peminjaman ke database
        $peminjaman->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function updateStatus($id)
    {
        // Temukan peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);

        // Ubah status peminjaman menjadi "Dalam Peminjaman"
        $peminjaman->status = 'Dalam Peminjaman';

        // Simpan perubahan status
        $peminjaman->save();

        // Redirect atau tampilkan pesan sukses jika perlu
        return redirect()->route('peminjaman.index')->with('success', 'Status peminjaman berhasil diubah menjadi "Dalam Peminjaman".');
    }

    public function delete($id)
    {
        // Temukan peminjaman yang ingin dihapus berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);

        // Hapus peminjaman dari database
        $peminjaman->delete();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
