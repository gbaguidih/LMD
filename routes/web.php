<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UeController;
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

//route pour Ue
Route::get('ue', [UeController::class, 'index'])->name('ue.index');
Route::get('ue/create', [UeController::class, 'create'])->name('ue.create');
Route::post('ue', [UeController::class, 'store'])->name('ue.store');
Route::get('ue/{id}/edit', [UeController::class, 'edit'])->name('ue.edit');
Route::put('ue/{id}', [UeController::class, 'update'])->name('ue.update');
Route::delete('ue/{id}', [UeController::class, 'destroy'])->name('ue.destroy');


require __DIR__.'/auth.php';
