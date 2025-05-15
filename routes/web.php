<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::resource('products', ProductController::class);
    Route::get('view/products', [ProductController::class, 'index'])->name('products');  
    Route::get('create/products', [ProductController::class, 'create'])->name('create.products'); 
    Route::get('show/products/{id}', [ProductController::class, 'show'])->name('show.products'); 
    Route::post('store/products', [ProductController::class, 'store'])->name('store.products'); 
    Route::put('update/products/{id}', [ProductController::class, 'update'])->name('update.products'); 
    Route::delete('destroy/products/{id}', [ProductController::class, 'destroy'])->name('destroy.products'); 
    Route::get('edit/products/{id}', [ProductController::class, 'edit'])->name('edit.products');
});

require __DIR__.'/auth.php';
