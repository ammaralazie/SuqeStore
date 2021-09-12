<?php

use App\Http\Controllers\SuqeStore\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([],function () {
    //usercontroller
    Route::post('signup/', [UserController::class,'signup'])->name('user.signup');
    Route::post('login/', [UserController::class,'login'])->name('user.login');
    Route::get('logout/', [UserController::class,'logout'])->name('user.logout');



});
