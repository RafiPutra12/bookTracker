<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [BookController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth', 'role:user')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
    Route::get('/loans/{book}', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans/{book}', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/loans/terminate/{loan}', [LoanController::class, 'terminate'])->name('loans.terminate');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('admin', AdminController::class);
    Route::get('exportExcel', [AdminController::class, 'exportExcel'])->name('admin.exportExcel');
    Route::get('exportPdf', [AdminController::class, 'exportPdf'])->name('admin.exportPdf');
});


