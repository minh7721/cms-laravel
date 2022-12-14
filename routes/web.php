<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('auth/login', [LoginController::class, 'index'])->name('login');
//Route::post('auth/login/authenticate', [LoginController::class, 'authenticate']);
//Route::get('auth/login/logout', [LoginController::class, 'logout']);
//Route::get('auth/register', [RegisterController::class, 'index']);
//Route::post('auth/register/create', [RegisterController::class, 'create']);
//
//Route::middleware(['auth'])->group(function (){
//    Route::get('/post/create', [PostController::class, 'create']);
//    Route::post('/post/create', [PostController::class, 'store']);
//
//
//    Route::prefix('admin')->group(function (){
//        Route::get('/', [AdminMainController::class, 'index'])->name('admin');
//        Route::get('main', [AdminMainController::class, 'index']);
//
//        #Menu
//        Route::prefix('menus')->group(function (){
//            Route::get('preview/{menu}', [MenuController::class, 'preview']);
//            Route::get('add', [MenuController::class, 'create']);
//            Route::post('add', [MenuController::class, 'store']);
//            Route::get('list', [MenuController::class, 'index']);
//            Route::get('edit/{menu}', [MenuController::class, 'show']);
//            Route::post('edit/{menu}', [MenuController::class, 'update']);
//            Route::delete('destroy', [MenuController::class, 'destroy']);
//
//        });
//
//        #Product
//        Route::prefix('product')->group(function (){
//            Route::get('preview/{product}', [ProductController::class, 'preview']);
//            Route::get('add', [ProductController::class, 'create']);
//            Route::post('add', [ProductController::class, 'store']);
//            Route::get('list', [ProductController::class, 'index']);
//            Route::get('edit/{product}', [ProductController::class, 'show']);
//            Route::post('edit/{product}', [ProductController::class, 'update']);
//            Route::delete('destroy', [ProductController::class, 'destroy']);
//        });
//
//        #Slider
//        Route::prefix('slider')->group(function (){
//            Route::get('preview/{slider}', [SliderController::class, 'preview']);
//            Route::get('add', [SliderController::class, 'create']);
//            Route::post('add', [SliderController::class, 'store']);
//            Route::get('list', [SliderController::class, 'index']);
//            Route::get('edit/{slider}', [SliderController::class, 'show']);
//            Route::post('edit/{slider}', [SliderController::class, 'update']);
//            Route::delete('destroy', [SliderController::class, 'destroy']);
//        });
//
//        #Tag
//        Route::prefix('tag')->group(function (){
//            Route::get('list', [TagController::class, 'index']);
//            Route::get('add', [TagController::class, 'create']);
//            Route::post('add', [TagController::class, 'store']);
//            Route::get('edit/{tag}', [TagController::class, 'show']);
//            Route::post('edit/{tag}', [TagController::class, 'update']);
//            Route::delete('destroy', [TagController::class, 'destroy']);
//        });
//
//        #Upload
//        Route::post('upload/services', [UploadController::class, 'store']);
//
//
//        #Authentication
//
//        #User
//        Route::prefix('users')->group(function (){
//            Route::get('list', [UserController::class, 'index']);
//            Route::get('create', [UserController::class, 'create']);
//            Route::post('create', [UserController::class, 'store']);
//            Route::get('edit/{user}', [UserController::class, 'show']);
//            Route::post('edit/{user}', [UserController::class, 'update']);
//            Route::delete('destroy', [UserController::class, 'destroy']);
//            Route::get('loginAnotherUser/{user}', [UserController::class, 'loginAnotherUser']);
//        });
//
//        #Role
//        Route::prefix('role')->group(function (){
//            Route::get('list', [RoleController::class, 'index']);
//            Route::get('create', [RoleController::class, 'create']);
//            Route::post('create', [RoleController::class, 'store']);
//            Route::get('edit/{role}', [RoleController::class, 'show']);
//            Route::post('edit/{role}', [RoleController::class, 'update']);
//            Route::delete('destroy', [RoleController::class, 'destroy']);
//        });
//
//        #Role
//        Route::prefix('permission')->group(function (){
//            Route::get('list', [PermissionController::class, 'index']);
//            Route::get('create', [PermissionController::class, 'create']);
//            Route::post('create', [PermissionController::class, 'store']);
//            Route::get('edit/{permission}', [PermissionController::class, 'show']);
//            Route::post('edit/{permission}', [PermissionController::class, 'update']);
//            Route::delete('destroy', [PermissionController::class, 'destroy']);
//        });
//    });
//
//});
//
//Route::get('/', [MainController::class, 'index']);
//Route::get('/category/{category}', [MainController::class, 'getByCategory']);
//Route::get('/{slug}', [MainController::class, 'detail']);
//
//Route::post('/admin/upload/services', [UploadController::class, 'store']);
//

