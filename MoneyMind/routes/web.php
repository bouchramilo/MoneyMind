<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIfAdmin;
use App\Http\Middleware\CheckIfUtilisateur;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// utilisateur routes **************************************************************************************************************
// Route pour les utilisateurs
Route::get('/utilisateur/dashboard', function () {
    return view('utilisateur/dashboard');
})->middleware(['auth', 'verified', CheckIfUtilisateur::class])->name('utilisateur.dashboard');

Route::middleware(['auth', 'verified', CheckIfUtilisateur::class])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.utilisateurs');

    

});
















// Admin routes **************************************************************************************************************
// Route pour les administrateurs

Route::middleware(['auth', 'verified', CheckIfAdmin::class])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.utilisateurs');

    Route::delete('/admin/dashboard/{id}', [AdminController::class, 'destroy'])->name('utilisateurs.destroy');

    Route::resource('categories', CategorieController::class)->only([
        'index', 'store', 'update','destroy',
    ]);

});


require __DIR__.'/auth.php';
