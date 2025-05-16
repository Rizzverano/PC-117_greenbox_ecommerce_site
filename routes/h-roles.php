<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RoleController;


Route::middleware(['auth', 'role:1,2'])->group(function () {
    Route::get('/manager', [RoleController::class, 'manager'])->name('roles.manager');
    Route::get('/manager/load-section', function (Request $request) {
        return app(RoleController::class)->loadSection($request, 'manager');
    })->name('manager.load-section');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/admin', [RoleController::class, 'admin'])->name('roles.admin');
    Route::get('/admin/load-section', function (Request $request) {
        return app(RoleController::class)->loadSection($request, 'admin');
    })->name('admin.load-section');
});

