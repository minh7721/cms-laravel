<?php

use App\Http\Controllers\Admin\Auth\LoginController;

Route::prefix('admin')
    ->group(function () {
        Route::get("login", [LoginController::class, 'showLoginForm'])->name('admin.auth.login');
        Route::post("login", [LoginController::class, 'login']);

        Route::middleware('auth_admin:backend')
            ->group(function () {
                Route::view('', 'admin.dashboard.index')->name('admin.dashboard');
            });
    });