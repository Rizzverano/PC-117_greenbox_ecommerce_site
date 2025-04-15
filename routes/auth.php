<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'store')->name('register.store');

        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('login.attempt');
    });

    Route::middleware('auth')->post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'role:1,2'])->group(function () {
    Route::get('/manager', [RoleController::class, 'manager'])->name('roles.manager');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/admin', [RoleController::class, 'admin'])->name('roles.admin');
});



