<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\DetailController;
use App\Http\Controllers\Frontend\MainController;

Route::prefix('/')
    ->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('frontend.main.index');
        Route::get('category/{slugCategory}', [CategoryController::class, 'index'])->name('frontend.main.category');
        Route::get('post/{slugArticle}', [DetailController::class, 'index'])->name('frontend.main.detail');
    });
