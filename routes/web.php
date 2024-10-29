<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalistController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




// =============================================================================================
// Hanya untuk admin yang login
Route::middleware('Authenticate')->group(function () {
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
});
// =============================================================================================



// Route Home/Dashboard untuk user
Route::get('/', [AnalistController::class, 'dashboard'])->name('dashboard');
Route::get('/view/pdf', [AnalistController::class, 'view_pdf'])->name('view_pdf');





