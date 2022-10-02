<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')
    ->group(function () {
        Route::get("login", [LoginController::class, 'showLoginForm'])->name('admin.auth.login');
        Route::post("login", [LoginController::class, 'login']);

        Route::middleware('auth_admin:backend')
            ->group(function () {
                Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard');

                //Users
                Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
                Route::get('/user/{id}/show', [UserController::class, 'index'])->name('admin.user.show');
                Route::get('/user/create', [UserController::class, 'index'])->name('admin.user.create');
                Route::post('/user/store', [UserController::class, 'index'])->name('admin.user.store');
                Route::get('/user/{id}/edit', [UserController::class, 'index'])->name('admin.user.edit');
                Route::post('/user/{id}/update', [UserController::class, 'index'])->name('admin.user.update');
                Route::post('/user/{id}/delete', [UserController::class, 'index'])->name('admin.user.delete');

            });
    });