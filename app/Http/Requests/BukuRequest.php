<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_buku' => 'unique:buku,id_buku',
            'kode_buku' => 'required|unique:buku,kode_buku',
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'kategori' => 'required|in:Fiksi,Non-Fiksi', // Sesuaikan dengan opsi kategori Anda
            'jumlah_salinan_tersedia' => 'required|integer',
            'rak' => 'required|in:Rak 1,Rak 2', // Sesuaikan dengan opsi rak Anda
            'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Contoh validasi cover
            'deskripsi' => 'nullable', // Deskripsi bisa kosong atau tidak diisi
        ];
    }
}
