<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('buku.buku', compact('buku'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'cover' => 'required|file|image|mimes:jpeg,png,jpg|max:2048', // Sesuaikan dengan nama input yang kamu gunakan
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'deskripsi' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'kategori' => 'required',
            'jumlah_salinan_tersedia' => 'required|numeric',
            'rak' => 'required',
        ]);

        // Menyimpan data buku
        $data = [
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori' => $request->kategori,
            'jumlah_salinan_tersedia' => $request->jumlah_salinan_tersedia,
            'rak' => $request->rak,
        ];

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverPath = $cover->storeAs('public/covers', $cover->getClientOriginalName());
            $data['cover'] = $cover->getClientOriginalName();
        } else {
            $coverPath = null;
        }

        Buku::create($data);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        // Temukan buku yang akan diupdate berdasarkan ID
        $buku = Buku::find($id);

        // Perbarui data buku berdasarkan input
        $buku->kode_buku = $request->kode_buku;
        $buku->judul_buku = $request->judul_buku;
        $buku->deskripsi = $request->deskripsi;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->kategori = $request->kategori;
        $buku->jumlah_salinan_tersedia = $request->jumlah_salinan_tersedia;
        $buku->rak = $request->rak;

        // Cek apakah ada file gambar yang diunggah untuk sampul buku
        if ($request->hasFile('cover')) {
            // Proses unggah file gambar dan simpan dengan nama yang unik
            $coverPath = $request->file('cover')->storeAs('public/covers', $request->file('cover')->getClientOriginalName());

            // Perbarui nama file sampul buku dalam basis data
            $buku->cover = $request->file('cover')->getClientOriginalName();
        }

        $buku->save();

        // Redirect kembali ke halaman buku dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Temukan buku yang akan dihapus berdasarkan ID
        $buku = Buku::find($id);

        // Periksa apakah buku ditemukan
        if (!$buku) {
            return redirect()->route('buku.index')->with('error', 'Buku tidak ditemukan.');
        }

        // Hapus file sampul buku jika ada
        if ($buku->cover) {
            Storage::delete('public/covers/' . $buku->cover);
        }

        // Hapus buku dari basis data
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
