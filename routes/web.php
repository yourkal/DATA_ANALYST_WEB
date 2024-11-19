<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalistController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduksiController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route Home/Dashboard untuk user/publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home2', [HomeController::class, 'index2'])->name('home2');
Route::get('/view/pdf', [AnalistController::class, 'view_pdf'])->name('view_pdf');

// Route untuk menampilkan detail qty (dapat diakses tanpa login)
Route::get('/analists/{id}/qty-detail', [AnalistController::class, 'qtyDetail'])->name('analists.qtyDetail');


// Route Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==============================================================================================================================================================================================================
// Hanya untuk admin yang login
Route::middleware([Authenticate::class])->group(function () {
    // Route untuk halaman utama yang menampilkan daftar analist
    Route::get('/analists/dashboard', [AnalistController::class, 'dashboard'])->name('analists.dashboard');
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

    //Route Halaman Produksi
    // Rute untuk menampilkan daftar produksi
    // Route::get('/produksi', [ProduksiController::class, 'index'])->name('produksi.index');
    // Rute untuk menampilkan form tambah produksi
    // Route::get('/produksi/create', [ProduksiController::class, 'create'])->name('produksi.create');
    // Rute untuk menyimpan data produksi baru
    // Route::post('/produksi', [ProduksiController::class, 'store'])->name('produksi.store');
    // Rute untuk menampilkan form edit produksi
    // Route::get('/produksi/{id}/edit', [ProduksiController::class, 'edit'])->name('produksi.edit');
    // Rute untuk memperbarui data produksi
    // Route::put('/produksi/{id}', [ProduksiController::class, 'update'])->name('produksi.update');
    // Rute untuk menghapus data produksi
    // Route::delete('/produksi/{id}', [ProduksiController::class, 'destroy'])->name('produksi.destroy');

    // Route untuk menampilkan detail qty
    // Route::get('/analists/{id}/qty-detail', [AnalistController::class, 'qtyDetail'])->name('analists.qtyDetail');
    Route::post('/analists/{id}/qty-detail', [AnalistController::class, 'storeQtyDetail'])->name('analists.storeQtyDetail');
    Route::delete('/analists/{id}/qty-detail/{qtyDetailId}', [AnalistController::class, 'deleteQtyDetail'])->name('analists.deleteQtyDetail');
    Route::get('/analists/{id}/qty-detail/{qtyDetailId}/edit', [AnalistController::class, 'editQtyDetail'])->name('analists.editQtyDetail');
    Route::put('/analists/{id}/qty-detail/{qtyDetailId}', [AnalistController::class, 'updateQtyDetail'])->name('analists.updateQtyDetail');

});
// =================================================================================================================================================================================

