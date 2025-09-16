<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

Route::get('/users/create', function () {
    return view('users.create');
})->name('users.create');

Route::get('/users/update', function () {
    return view('users.create');
})->name('users.update');



