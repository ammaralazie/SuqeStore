<?php

use App\Http\Controllers\SuqeStore\ProductController;
use App\Http\Controllers\SuqeStore\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//user controller
Route::group([],function () {
    Route::post('signup/', [UserController::class,'signup'])->name('user.signup');
    Route::post('login/', [UserController::class,'login'])->name('user.login');
    Route::get('logout/', [UserController::class,'logout'])->name('user.logout');

    //product controller
    Route::get('product/index', [ProductController::class,'index']);
    Route::post('product/create-product', [ProductController::class,'create']);
    // Route::resource('product', ProductController::class)->except(['show']);
    Route::get('select-fields',[ProductController::class,'select_fields']);
});


