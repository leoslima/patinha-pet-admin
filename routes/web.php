<?php

use App\Http\Controllers\ProfileController;
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

Route::resource('products', App\Http\Controllers\ProductController::class);
Route::resource('stocks', App\Http\Controllers\StockController::class)->only(['index', 'create', 'store']);

require __DIR__ . '/auth.php';
// Rota para view cliente
Route::get('/customer', function () {
    return view('customer.index');})->name('customer.index');

require __DIR__.'/auth.php';
