<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ItemController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [HomeController::class, 'categories'])->name('categories');
Route::get('/categories/{category}', [HomeController::class, 'category'])->name('category');
Route::get('/categories/{category}/content/{content}', [HomeController::class, 'content'])->name('content');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('items', [ItemController::class, 'index'])->name('items.index');
    Route::get('items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('items', [ItemController::class, 'store'])->name('items.store');
    Route::get('items/{content}', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('items/{content}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('items/{content}', [ItemController::class, 'destroy'])->name('items.destroy');
});

require __DIR__ . '/auth.php';
