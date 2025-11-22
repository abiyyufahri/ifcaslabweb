<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TpmodulController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('tpmoduls', TpmodulController::class);
Route::resource('categories', CategoryController::class)->names('categories');

Route::get('public/tpmoduls', [TpmodulController::class, 'publicShow'])->name('tpmoduls.publicShow');
Route::get('public/tpmoduls/{tpmodul}', [TpmodulController::class, 'publicShowDetail'])->name('tpmoduls.publicShowDetail');
// auth routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.process');
Route::get('register', [AuthController::class, 'index'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.process');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
