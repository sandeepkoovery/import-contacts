<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Routes for Contact CRUD operations
Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// Route for bulk XML import
Route::get('/contacts/import', [ContactController::class, 'showImportForm'])->name('contacts.import.form');
Route::post('/contacts/import', [ContactController::class, 'import'])->name('contacts.import');

