<?php

use App\Http\Controllers\EcController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    
})->name('welcome');

Route::view('/etudiant', 'etudiant')->name('etudiant');

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

//route pour Ec
Route::get('ec', [EcController::class, 'index'])->name('ec.index');
Route::get('ec/create', [EcController::class, 'create'])->name('ec.create');
Route::post('ec', [EcController::class, 'store'])->name('ec.store');
Route::get('ec/{id}/edit', [EcController::class, 'edit'])->name('ec.edit');
Route::put('ec/{id}', [EcController::class, 'update'])->name('ec.update');
Route::delete('ec/{id}', [EcController::class, 'destroy'])->name('ec.destroy');

//route pour Etudiant 
Route::get('etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('etudiant/{id}/edit', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant/{id}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('etudiant/{id}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');

//route pour Note
Route::get('note', [NoteController::class, 'index'])->name('note.index');
Route::get('note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('note', [NoteController::class, 'store'])->name('note.store');
Route::get('note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
Route::put('note/{id}', [NoteController::class, 'update'])->name('note.update');
Route::delete('note/{id}', [NoteController::class, 'destroy'])->name('note.destroy');

require __DIR__.'/auth.php';
