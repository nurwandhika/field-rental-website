<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\LandingController::class,'index'])->name('schedule');
Route::get('/gallery',[\App\Http\Controllers\LandingController::class,'gallery'])->name('gallery');
Route::get('/about',[\App\Http\Controllers\LandingController::class,'about'])->name('about');

Route::group(['as' => 'auth::', 'prefix' => '/auth'],function (){
    Route::get('/admin',[\App\Http\Controllers\Admin\AuthController::class,'index'])->name('index');
    Route::post('/admin',[\App\Http\Controllers\Admin\AuthController::class,'login'])->name('login');
    Route::get('/',[\App\Http\Controllers\User\AuthController::class,'index'])->name('user-index');
    Route::get('/register',[\App\Http\Controllers\User\AuthController::class,'register'])->name('register');
    Route::post('/register',[\App\Http\Controllers\User\AuthController::class,'store'])->name('register-store');
    Route::post('/',[\App\Http\Controllers\User\AuthController::class,'login'])->name('user-login');
    Route::get('/user/logout',[\App\Http\Controllers\User\AuthController::class,'logout'])->middleware('web')->name('user-logout');
    Route::get('/admin/logout',[\App\Http\Controllers\Admin\AuthController::class,'logout'])->middleware('admin')->name('logout');
});

Route::group(['prefix' => 'user', 'as' => 'user::', 'middleware' => 'user'],function (){
    Route::get('/transaction',[\App\Http\Controllers\User\TransactionController::class,'index'])->name('transaction');
    Route::get('/transaction/{transaction}/reschedule',[\App\Http\Controllers\User\TransactionController::class,'reschedule'])->name('reschedule');
    Route::get('/transaction/{transaction}/cancel',[\App\Http\Controllers\User\TransactionController::class,'cancel'])->name('cancel-order');
    Route::get('/profile',[\App\Http\Controllers\User\ProfileController::class,'index'])->name('profile');
    Route::put('/profile',[\App\Http\Controllers\User\ProfileController::class,'update'])->name('profile-update');
    Route::get('/transaction/{transaction}',[\App\Http\Controllers\User\TransactionController::class,'show'])->name('show-transaction');
    Route::get('/transaction/{transaction}/upload',[\App\Http\Controllers\User\TransactionController::class,'imageForm'])->name('upload-form');
    Route::post('/transaction/{transaction}/upload',[\App\Http\Controllers\User\TransactionController::class,'imageStore'])->name('upload-store');
});

Route::group(['prefix' => 'admin', 'as' => 'admin::', 'middleware' => 'admin'],function (){
    Route::group(['prefix' => 'profile', 'as' => 'profile::'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\ProfileController::class,'index'])->name('index');
        Route::put('/',[\App\Http\Controllers\Admin\ProfileController::class,'update'])->name('update');
    });
    Route::group(['prefix' => 'user', 'as' => 'user::'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('index');
    });
    Route::group(['prefix' => 'schedule', 'as' => 'schedule::'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\ScheduleController::class,'index'])->name('index');
        Route::get('/generate',[\App\Http\Controllers\Admin\ScheduleController::class,'create'])->name('create');
        Route::post('/generate',[\App\Http\Controllers\Admin\ScheduleController::class,'store'])->name('store');
        Route::get('/change-status/{schedule}',[\App\Http\Controllers\Admin\ScheduleController::class,'changeStatus'])->name('change-status');
    });
    Route::group(['prefix' => 'field', 'as' => 'field::'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\FieldController::class,'index'])->name('index');
        Route::get('/create',[\App\Http\Controllers\Admin\FieldController::class,'create'])->name('create');
        Route::post('/create',[\App\Http\Controllers\Admin\FieldController::class,'store'])->name('store');
        Route::get('/{field}/edit',[\App\Http\Controllers\Admin\FieldController::class,'edit'])->name('edit');
        Route::put('/{field}/edit',[\App\Http\Controllers\Admin\FieldController::class,'update'])->name('update');
        Route::get('/{field}/show',[\App\Http\Controllers\Admin\FieldController::class,'show'])->name('show');

        Route::group(['prefix' => '/{field}/image', 'as' => 'image::'],function (){
            Route::get('/',[\App\Http\Controllers\Admin\FieldController::class,'imageForm'])->name('index');
            Route::post('/',[\App\Http\Controllers\Admin\FieldController::class,'imageStore'])->name('store');
        });
    });
    Route::group(['prefix' => 'admin', 'as' => 'admin::'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('index');
        Route::get('/create',[\App\Http\Controllers\Admin\AdminController::class,'create'])->name('create');
        Route::post('/create',[\App\Http\Controllers\Admin\AdminController::class,'store'])->name('store');
        Route::get('/{admin}/edit',[\App\Http\Controllers\Admin\AdminController::class,'edit'])->name('edit');
        Route::put('/{admin}/edit',[\App\Http\Controllers\Admin\AdminController::class,'update'])->name('update');
    });

    Route::group(['prefix' => 'equipment', 'as' => 'equipment::'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\EquipmentController::class,'index'])->name('index');
        Route::get('/create',[\App\Http\Controllers\Admin\EquipmentController::class,'create'])->name('create');
        Route::post('/create',[\App\Http\Controllers\Admin\EquipmentController::class,'store'])->name('store');
        Route::get('/{equipment}/edit',[\App\Http\Controllers\Admin\EquipmentController::class,'edit'])->name('edit');
        Route::put('/{equipment}/edit',[\App\Http\Controllers\Admin\EquipmentController::class,'update'])->name('update');
    });

    Route::group(['prefix' => 'transaction', 'as' => 'transaction::'],function (){
        Route::get('/',[\App\Http\Controllers\Admin\TransactionController::class,'index'])->name('index');
        Route::get('/{transaction}/confirm',[\App\Http\Controllers\Admin\TransactionController::class,'confirm'])->name('confirm');
        Route::get('/{transaction}/cancel',[\App\Http\Controllers\Admin\TransactionController::class,'cancel'])->name('cancel');
        Route::get('/{transaction}/pending',[\App\Http\Controllers\Admin\TransactionController::class,'pending'])->name('pending');
        Route::get('/{transaction}',[\App\Http\Controllers\Admin\TransactionController::class,'show'])->name('show');
    });
});
