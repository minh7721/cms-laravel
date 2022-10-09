<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;


Route::prefix('admin')
    ->group(function () {
        Route::get("login", [LoginController::class, 'showLoginForm'])->name('admin.auth.login');
        Route::post("login", [LoginController::class, 'login']);
        Route::post('logout', [LoginController::class, 'logout'])->name('admin.auth.logout');
        Route::middleware('auth_admin:backend')
            ->group(function () {
                Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard');

                //Category
                Route::prefix('category')->group(function (){
                    Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
                    Route::get('{id}/show', [CategoryController::class, 'show'])->name('admin.category.show');
                    Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
                    Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');
                    Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
                    Route::post('{id}/update', [CategoryController::class, 'update'])->name('admin.category.update');
                    Route::get('{id}/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
                });

                //Article
                Route::prefix('article')->group(function (){
                    Route::get('/', [ArticleController::class, 'index'])->name('admin.article.index');
                    Route::get('{id}/show', [ArticleController::class, 'show'])->name('admin.article.show');
                    Route::get('create', [ArticleController::class, 'create'])->name('admin.article.create');
                    Route::post('store', [ArticleController::class, 'store'])->name('admin.article.store');
                    Route::get('{id}/edit', [ArticleController::class, 'edit'])->name('admin.article.edit');
                    Route::post('{id}/update', [ArticleController::class, 'update'])->name('admin.article.update');
                    Route::get('{id}/delete', [ArticleController::class, 'delete'])->name('admin.article.delete');
                });

                #Upload
                Route::post('upload/services', [UploadController::class, 'store'])->name('admin.upload.store');

                //Tag
                Route::prefix('tag')->group(function (){
                    Route::get('/', [TagController::class, 'index'])->name('admin.tag.index');
                    Route::get('{id}/show', [TagController::class, 'show'])->name('admin.tag.show');
                    Route::get('create', [TagController::class, 'create'])->name('admin.tag.create');
                    Route::post('store', [TagController::class, 'store'])->name('admin.tag.store');
                    Route::get('{id}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
                    Route::post('{id}/update', [TagController::class, 'update'])->name('admin.tag.update');
                    Route::get('{id}/delete', [TagController::class, 'delete'])->name('admin.tag.delete');
                });

                //Users
                Route::prefix('user')->group(function (){
                    Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
                    Route::get('{id}/show', [UserController::class, 'show'])->name('admin.user.show');
                    Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
                    Route::post('store', [UserController::class, 'store'])->name('admin.user.store');
                    Route::get('{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
                    Route::post('{id}/update', [UserController::class, 'update'])->name('admin.user.update');
                    Route::get('{id}/delete', [UserController::class, 'delete'])->name('admin.user.delete');
                    Route::get('{id}/loginAnotherUser', [UserController::class, 'loginAnotherUser'])->name('admin.user.change');
                });

            });
    });

