<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('auth/activate-account/{email}/{token}', [AuthController::class, 'setPassword'])
    ->name('auth.activate-account')
    ->middleware('guest');

Route::post('/auth/activate-account', [AuthController::class, 'activateAccount'])->name('activate-account')->middleware('guest');

Route::get('/auth/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/auth/authenticate', [AuthController::class, 'authenticate'])->name('authenticate')->middleware('guest');

Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/auth/generate-reset-password-email', [AuthController::class, 'generateResetPasswordEmail'])->name('generate-reset-password-email');
Route::get('/auth/reset-password/{email}/{token}', [AuthController::class, 'resetPassword'])->name('reset-password')->middleware('guest');

Route::middleware(['auth'])->group(function (){

    Route::get('/', function () {
        return view('home.index');
    })->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
});




