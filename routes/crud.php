<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VegefruitController;
use App\Http\Controllers\MeatController;
use App\Http\Controllers\SeafoodController;


// Authenticated & role-based routes
Route::middleware(['auth', 'role:1,2'])->group(function () {

    // Vegefruit routes
    Route::get('/vegefruits', [VegefruitController::class, 'index'])->name('vegefruits.index');
    Route::get('/vegefruits/create', [VegefruitController::class, 'create'])->name('vegefruits.create');
    Route::post('/vegefruits', [VegefruitController::class, 'store'])->name('vegefruits.store');
    Route::get('/vegefruits/{vegefruit}/edit', [VegefruitController::class, 'edit'])->name('vegefruits.edit');
    Route::patch('/vegefruits/{vegefruit}', [VegefruitController::class, 'update'])->name('vegefruits.update');
    Route::delete('/vegefruits/{vegefruit}', [VegefruitController::class, 'destroy'])->name('vegefruits.destroy');

    // Meat routes
    Route::get('/meats', [MeatController::class, 'index'])->name('meats.index');
    Route::get('/meats/create', [MeatController::class, 'create'])->name('meats.create');
    Route::post('/meats', [MeatController::class, 'store'])->name('meats.store');
    Route::get('/meats/{meat}/edit', [MeatController::class, 'edit'])->name('meats.edit');
    Route::patch('/meats/{meat}', [MeatController::class, 'update'])->name('meats.update');
    Route::delete('/meats/{meat}', [MeatController::class, 'destroy'])->name('meats.destroy');

    // Seafood routes
    Route::get('/seafoods', [SeafoodController::class, 'index'])->name('seafoods.index');
    Route::get('/seafoods/create', [SeafoodController::class, 'create'])->name('seafoods.create');
    Route::post('/seafoods', [SeafoodController::class, 'store'])->name('seafoods.store');
    Route::get('/seafoods/{seafood}/edit', [SeafoodController::class, 'edit'])->name('seafoods.edit');
    Route::patch('/seafoods/{seafood}', [SeafoodController::class, 'update'])->name('seafoods.update');
    Route::delete('/seafoods/{seafood}', [SeafoodController::class, 'destroy'])->name('seafoods.destroy');
});

// Public "show" routes
Route::get('/vegefruits/{vegefruit}', [VegefruitController::class, 'show'])->name('vegefruits.show');
Route::get('/meats/{meat}', [MeatController::class, 'show'])->name('meats.show');
Route::get('/seafoods/{seafood}', [SeafoodController::class, 'show'])->name('seafoods.show');


