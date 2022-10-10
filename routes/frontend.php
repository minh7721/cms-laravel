<?php

use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\LoginGoogleController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\DetailController;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Frontend\UploadController;
use App\Http\Controllers\Frontend\UserController;
use Laravel\Socialite\Facades\Socialite;


Route::prefix('/')
    ->group(function () {
        Route::get('login', [LoginController::class, 'loginForm'])->name('frontend.auth.login');
        Route::post('login', [LoginController::class, 'authenticate'])->name('frontend.auth.checkLogin');
        Route::get('logout', [LoginController::class, 'logout'])->name('frontend.auth.logout');
        Route::get('registration', [RegisterController::class, 'showRegistrationForm'])->name('frontend.auth.registration');
        Route::post('registration', [RegisterController::class, 'create'])->name('frontend.auth.registration');

        // Login Facebook
        Route::get('auth/facebook', function () {
            return Socialite::driver('facebook')->redirect();
        })->name('frontend.login.facebook');

        Route::get('auth/facebook/callback', function () {
            return 'Call back Facebook';
        });

        // Google
        Route::get('auth/google', function () {
            return Socialite::driver('google')->redirect();
        })->name('frontend.login.google');

        Route::get('auth/google/callback', [LoginGoogleController::class, 'index']);


        Route::middleware('auth')->group(function (){
            Route::get('profile',[UserController::class, 'profile'])->name('frontend.user.profile');
            Route::post('profile',[UserController::class, 'update'])->name('frontend.user.update');
            Route::get('change-password', [UserController::class, 'changePass'])->name('frontend.user.changepass');
            Route::post('change-password', [UserController::class, 'updatePassword'])->name('frontend.user.updatePassword');
            #Upload
            Route::post('upload/services', [UploadController::class, 'store'])->name('frontend.upload.store');
        });

        Route::get('/', [MainController::class, 'index'])->name('frontend.main.index');
        Route::get('category/{slugCategory}', [CategoryController::class, 'index'])->name('frontend.category.index');
        Route::get('post/{slugArticle}', [DetailController::class, 'index'])->name('frontend.detail.index');
        Route::get('/tag/{tag}', [MainController::class, 'listByTag'])->name('frontend.main.listbytag');
    });
