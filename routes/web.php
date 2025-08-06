<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\CompanyAuthController;

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

// === Usuario ===
Route::get('/login/user', [UserAuthController::class, 'showLoginForm'])->name('login.user');
Route::get('/register/user', [UserAuthController::class, 'showRegisterForm'])->name('register.user');
Route::post('/login/user', [UserAuthController::class, 'login']);
Route::post('/register/user', [UserAuthController::class, 'register']);

// === Empresa ===
Route::get('/login/company', [CompanyAuthController::class, 'showLoginForm'])->name('login.company');
Route::get('/register/company', [CompanyAuthController::class, 'showRegisterForm'])->name('register.company');
Route::post('/login/company', [CompanyAuthController::class, 'login']);
Route::post('/register/company', [CompanyAuthController::class, 'register']);

// Logout (puedes reutilizar uno solo)
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');