<?php

use App\Http\Controllers\AreaController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tipos', [TipoController::class, 'index'])->name('tipos.index');
Route::post('/tipos', [TipoController::class, 'store'])->name('tipos.store');
Route::delete('/tipos/{id}', [TipoController::class, 'destroy'])->name('tipos.destroy');
// Route::get('/tipos/{id}', [TipoController::class, 'show'])->name('tipos.show');
// Route::get('/tipos/{id}/edit', [TipoController::class, 'edit'])->name('tipos.edit');

Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');
// Route::get('/areas/{id}', [AreaController::class, 'show'])->name('areas.show');
// Route::get('/areas/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

require __DIR__.'/auth.php';
