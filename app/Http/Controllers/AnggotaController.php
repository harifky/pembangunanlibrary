<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.anggota', compact('anggota'));
    }

    public function create(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nis' => 'required|unique:anggota',
            'password' => 'required|min:6',
            'nama_anggota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'tanggal_bergabung' => 'required|date',
        ]);

        // Buat instance Anggota dan isi dengan data dari form
        $anggota = new Anggota;
        $anggota->id_anggota = $request->id_anggota;
        $anggota->nis = $request->nis;
        $anggota->password = bcrypt($request->password);
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->kelas = $request->kelas;
        $anggota->jurusan = $request->jurusan;
        $anggota->alamat = $request->alamat;
        $anggota->nomor_telepon = $request->nomor_telepon;
        $anggota->tanggal_bergabung = $request->tanggal_bergabung;
        $anggota->status = 'Aktif'; // Tambahkan status 'Aktif' secara default

        // Simpan anggota ke database
        $anggota->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_anggota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'status' => 'required', // Validasi status
        ]);

        // Cari anggota yang ingin diupdate berdasarkan ID
        $anggota = Anggota::findOrFail($id);

        // Update kolom-kolom yang bisa diubah
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->kelas = $request->kelas;
        $anggota->jurusan = $request->jurusan;
        $anggota->alamat = $request->alamat;
        $anggota->nomor_telepon = $request->nomor_telepon;
        $anggota->status = $request->status; // Update status

        // Simpan perubahan ke database
        $anggota->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diupdate.');
    }

    public function delete($id)
    {
        // Temukan anggota berdasarkan ID
        $anggota = Anggota::find($id);

        // Jika anggota ditemukan, hapus data anggota
        if ($anggota) {
            $anggota->delete();
            return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
        } else {
            return redirect()->route('anggota.index')->with('error', 'Anggota tidak ditemukan.');
        }
    }
}
