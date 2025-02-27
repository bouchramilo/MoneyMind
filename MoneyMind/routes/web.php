<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ConfigAlerteController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\DepenseRecurrenteController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SouhaitsController;
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

    // Route::get('/utilisateur/dashboard', [AdminController::class, 'index'])->name('admin.utilisateurs');

    Route::get('/utilisateur/depenses_reccurentes', [DepenseRecurrenteController::class, 'index'])->name('utilisateur.reccurente');
    Route::get('/utilisateur/depenses', [DepenseController::class, 'index'])->name('utilisateur.depenses');
    Route::get('/utilisateur/objectifsMensuel', [ObjectifController::class, 'index'])->name('utilisateur.objectifs');
    Route::get('/utilisateur/souhaits', [SouhaitsController::class, 'index'])->name('utilisateur.souhaits');
    Route::get('utilisateur/configuration', [ConfigAlerteController::class, 'index'])->name('utilisateur.configuration');



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
