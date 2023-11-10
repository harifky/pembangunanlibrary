<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::post('/buku', [BukuController::class, 'create'])->name('buku.create');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::post('/buku/edit/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/buku/delete/{id}', [BukuController::class, 'delete'])->name('buku.delete');

    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::post('/anggota', [AnggotaController::class, 'create'])->name('anggota.create');
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::post('/anggota/edit/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::get('/anggota/delete/{id}', [AnggotaController::class, 'delete'])->name('anggota.delete');

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::post('/peminjaman', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::get('/peminjaman/update-status/{id}', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.update-status');
    Route::get('/peminjaman/delete/{id}', [PeminjamanController::class, 'delete'])->name('peminjaman.delete');

    Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
    Route::post('/pengembalian', [PengembalianController::class, 'create'])->name('pengembalian.create');
    Route::get('/pengembalian/update-status/{id}', [PengembalianController::class, 'updateStatus'])->name('pengembalian.update-status');
    Route::get('/pengembalian/delete/{id}', [PengembalianController::class, 'delete'])->name('pengembalian.delete');
});

require __DIR__.'/auth.php';
