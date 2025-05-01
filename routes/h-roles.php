<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;


Route::middleware(['auth', 'role:1,2'])->group(function () {
    // Manager Dashboard
    Route::get('/manager', [RoleController::class, 'manager'])->name('roles.manager');
    Route::get('/manager/load-section', [RoleController::class, 'loadManagerSection'])
         ->name('manager.load-section');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    // Admin Dashboard
    Route::get('/admin', [RoleController::class, 'admin'])->name('roles.admin');
    Route::get('/admin/load-section', [RoleController::class, 'loadAdminSection'])
         ->name('admin.load-section');
});
