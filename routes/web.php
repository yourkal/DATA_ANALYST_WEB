<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalistController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Home/Dashboard
Route::get('/', [AnalistController::class, 'dashboard'])->name('dashboard');

// Route untuk halaman utama yang menampilkan daftar analist
Route::get('/analist', [AnalistController::class, 'index'])->name('analists.index');

// Route untuk halaman form tambah analist
Route::get('/analists/create', [AnalistController::class, 'create'])->name('analists.create');

// Route untuk menyimpan data analist baru
Route::post('/analists', [AnalistController::class, 'store'])->name('analists.store');

// Route untuk halaman form edit analist
Route::get('/analists/edit/{id}', [AnalistController::class, 'edit'])->name('analists.edit');

// Route untuk update data analist yang di-edit
Route::put('/analists/{id}', [AnalistController::class, 'update'])->name('analists.update');

// Route untuk menghapus data analist
Route::delete('/analists/{id}', [AnalistController::class, 'destroy'])->name('analists.destroy');



