<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EstablishmentController;





Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::resource('establishments', EstablishmentController::class);
    Route::resource('classes', ClasseController::class);
    Route::resource('marques', MarqueController::class);
    Route::resource('types', TypeController::class);
    Route::resource('devices', DeviceController::class);
    // Note: No resource route for users as admin cannot handle users CRUD
});

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::resource('establishments', EstablishmentController::class);
    Route::resource('classes', ClasseController::class);
    Route::resource('marques', MarqueController::class);
    Route::resource('types', TypeController::class);
    Route::resource('devices', DeviceController::class);
    Route::resource('users', UserController::class);
});
