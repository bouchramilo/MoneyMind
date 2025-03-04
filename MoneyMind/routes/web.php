<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ConfigAlerteController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\DepenseRecurrenteController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SouhaitsController;
use App\Http\Controllers\UserDashboardController;
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
// Route::get('/utilisateur/dashboard', function () {
//     return view('utilisateur/dashboard');
// })->middleware(['auth', 'verified', CheckIfUtilisateur::class])->name('utilisateur.dashboard');

Route::middleware(['auth', 'verified', CheckIfUtilisateur::class])->group(function () {

    Route::get('/utilisateur/dashboard', [UserDashboardController::class, 'index'])->name('utilisateur.dashboard');

    

    Route::get('/utilisateur/depenses', [DepenseController::class, 'index'])->name('utilisateur.depenses');
    Route::post('/utilisateur/depenses/store', [DepenseController::class, 'store'])->name('utilisateur.depenses.store');
    Route::delete("/utilisateur/depenses/destroy/{depense}", [DepenseController::class, 'destroy'])->name('utilisateur.depenses.destroy');


    Route::get('/utilisateur/depenses_reccurentes', [DepenseRecurrenteController::class, 'index'])->name('utilisateur.reccurente');
    Route::post('/utilisateur/depenses_reccurentes/store', [DepenseRecurrenteController::class, 'store'])->name('utilisateur.depenses_reccurentes.store');
    Route::delete("/utilisateur/depenses_reccurentes/destroy/{depense}", [DepenseRecurrenteController::class, 'destroy'])->name('utilisateur.depenses_reccurentes.destroy');
    // Route::put("/utilisateur/depenses_reccurentes/update/{depense}", [DepenseRecurrenteController::class, 'update'])->name('utilisateur.depenses_reccurentes.update');


    Route::get('/utilisateur/souhaits', [SouhaitsController::class, 'index'])->name('utilisateur.souhaits');
    Route::post('/utilisateur/listesouhaits/store', [SouhaitsController::class, 'store'])->name('utilisateur.souhaits.store');
    Route::delete("/utilisateur/listesouhaits/destroy/{souhait}", [SouhaitsController::class, 'destroy'])->name('utilisateur.souhaits.destroy');
    Route::put("/utilisateur/listesouhaits/update", [SouhaitsController::class, 'update'])->name('utilisateur.souhaits.update');


    Route::get('/utilisateur/objectifsMensuel', [ObjectifController::class, 'index'])->name('utilisateur.objectifs');
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
