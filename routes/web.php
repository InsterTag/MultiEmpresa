<?php

use Illuminate\Support\Facades\Route;

//rutas vistas individuales

//home
Route::get('/home', function () {
    return view('home');
})->name('home');

//products
Route::get('/productos', function () {
    return view('welcome');
})->name('productos');

//perfiles

//usuarios
Route::get('/user', function () {
    return view('profiles.profile');
})->name('user');

//empresas
Route::get('/company', function () {
    return view('profiles.company');
})->name('company');