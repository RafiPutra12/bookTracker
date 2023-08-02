<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
<<<<<<< HEAD
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
=======
>>>>>>> Tugas-Dewa/main

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

<<<<<<< HEAD
Route::get('/', [HomeController::class, 'index']);
=======
// Route::get('/', [BookController::class, 'index']);
Route::get('/', function(){
    return view('auth.login');
});
>>>>>>> Tugas-Dewa/main

Route::get('/dashboard', [BookController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

<<<<<<< HEAD
Route::middleware('auth', 'role:user')->group(function () {
=======
// Route::middleware('auth')->group(function () {
//     Route::get('/books', [BookController::class, 'index'])->name('books.index');
//     Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
//     Route::get('/loans/{book}', [LoanController::class, 'create'])->name('loans.create');
//     Route::post('/loans/{book}', [LoanController::class, 'store'])->name('loans.store');
//     Route::get('/loans/terminate/{loan}', [LoanController::class, 'terminate'])->name('loans.terminate');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Rute untuk Pengguna Biasa
Route::middleware(['auth', 'role:user'])->group(function () {
>>>>>>> Tugas-Dewa/main
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
    Route::get('/loans/{book}', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans/{book}', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/loans/terminate/{loan}', [LoanController::class, 'terminate'])->name('loans.terminate');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

<<<<<<< HEAD
require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('admin', AdminController::class);
    Route::get('exportExcel', [AdminController::class, 'exportExcel'])->name('admin.exportExcel');
    Route::get('exportPdf', [AdminController::class, 'exportPdf'])->name('admin.exportPdf');
});


=======
// Rute untuk Pustakawan
Route::middleware(['auth', 'role:pustakawan'])->group(function () {
    // Route::get('/special-books', [BookController::class, 'specialBooks'])->name('books.special');
    // Route::get('/loan-history', [LoanController::class, 'history'])->name('loans.history');
    // Tambahan rute khusus untuk pustakawan
    Route::view('/pustakawan','pustakawan');
});

require __DIR__.'/auth.php';
>>>>>>> Tugas-Dewa/main
