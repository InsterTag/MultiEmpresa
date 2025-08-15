<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\CompanyAuthController;
//rutas vistas individuales

//home
Route::get('/', function () {
    return view('home');
})->name('home');

//products
Route::get('/productos', function () {
    return view('products.products');
})->name('productos');

//superAdmin
Route::get('/superAdmin', function () {
    return view('profiles.admin.admin');
})->name('superAdmin');


//rutas de vistas empresa
Route::get('/dashboard', function () {
    return view('profiles.company.dashboard.dashboard');
})->name('dashboard');

Route::get('/analysis', function () {
    return view('profiles.company.analysis.analysis');
})->name('analysis');

Route::get('/branches', function () {
    return view('profiles.company.branches.branches');
})->name('branches');

Route::get('/employees', function () {
    return view('profiles.company.employees.employees');
})->name('employees');

Route::get('/generalInformation', function () {
    return view('profiles.company.generalInformation.generalInformation');
})->name('generalInformation');

Route::get('/productsection', function () {
    return view('profiles.company.productsection.productsSection');
})->name('productsection');







// === Register y Login ===
Route::get('/login', [AuthController::class, 'login'])->name('login.form');
Route::post('/login', [AuthController::class, 'LoginRequest'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register.form');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::get('/products', function () {return view('products');})->name('products');




Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/profile', function () {return view('profiles.user.profile');})->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/upload-image', [ProfileController::class, 'uploadImage'])->name('profile.uploadImage');



//empresas
Route::get('/company', function () {
    return view('profiles.company');
})->name('company');
});
// // === Empresa ===
Route::get('/login/company', [CompanyAuthController::class, 'showLoginForm'])->name('login.company');
Route::get('/register/company', [CompanyAuthController::class, 'showRegisterForm'])->name('register.company');
Route::post('/login/company', [CompanyAuthController::class, 'login']);
Route::post('/register/company', [CompanyAuthController::class, 'register']);

// Logout (puedes reutilizar uno solo)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');