<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard (sudah ada dari Breeze, biarkan)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Resource route — 1 baris ini mendaftarkan 7 route sekaligus:
    // GET    /projects           → index()   (daftar)
    // GET    /projects/create    → create()  (form tambah)
    // POST   /projects           → store()   (simpan baru)
    // GET    /projects/{id}      → show()    (detail)
    // GET    /projects/{id}/edit → edit()    (form edit)
    // PUT    /projects/{id}      → update()  (simpan perubahan)
    // DELETE /projects/{id}      → destroy() (hapus)
    Route::resource('projects', ProjectController::class);
});

require __DIR__ . '/auth.php';
