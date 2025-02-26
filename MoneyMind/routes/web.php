<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// utilisateur routes **************************************************************************************************************
Route::get('/dashboard', function () {
    return view('utilisateur/dashboard');
})->middleware(['auth', 'verified', 'role:Utilisateur'])->name('dashboard');



// Admin routes **************************************************************************************************************
Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified', 'role:Admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategorieController::class)->only([
        'index', 'store', 'update','destroy',
    ]);
});






require __DIR__.'/auth.php';
