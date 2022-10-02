<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')
    ->group(function () {
        Route::get("login", [LoginController::class, 'showLoginForm'])->name('admin.auth.login');
        Route::post("login", [LoginController::class, 'login']);

        Route::middleware('auth_admin:backend')
            ->group(function () {
                Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard');
            });
    });