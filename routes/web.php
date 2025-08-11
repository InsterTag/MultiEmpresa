<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

//rutas vistas individuales

//home
Route::get('/', function () {
    return view('home');
})->name('home');

//products
Route::get('/productos', function () {
    return view('products.products');
})->name('productos');





// === Register y Login ===
Route::get('/login', [AuthController::class, 'login'])->name('login.form');
Route::post('/login', [AuthController::class, 'LoginRequest'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register.form');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::get('/products', function () {return view('products');})->name('products');




Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');




    Route::get('/profile', function () {return view('profiles.profile');})->name('profile');

//empresas
Route::get('/company', function () {
    return view('profiles.company');
})->name('company');
});














// // === Empresa ===
// Route::get('/login/company', [CompanyAuthController::class, 'showLoginForm'])->name('login.company');
// Route::get('/register/company', [CompanyAuthController::class, 'showRegisterForm'])->name('register.company');
// Route::post('/login/company', [CompanyAuthController::class, 'login']);
// Route::post('/register/company', [CompanyAuthController::class, 'register']);

// Logout (puedes reutilizar uno solo)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');