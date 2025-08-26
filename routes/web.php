    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\AuthController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\CompanyController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AddressController;
    use App\Http\Controllers\PaymentCardController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\BranchController;


    //home
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/productos2', [ProductController::class, 'index2'])->name('products.index');

    //shoppintcart
    Route::get('/shoppingcart', function () {
        return view('shoppingcart.shoppingcart');
    })->name('carritodecompras');



    //rutas de vistas empresa
    Route::get('/dashboard', function () {
        return view('profiles.company.dashboard.dashboard');
    })->name('dashboard');

    Route::get('/analysis', function () {
        return view('profiles.company.analysis.analysis');
    })->name('analysis');

    Route::get('/employees', function () {
        return view('profiles.company.employees.employees');
    })->name('employees');

    Route::get('/generalInformation', function () {
        return view('profiles.company.generalInformation.generalInformation');
    })->name('generalInformation');

    Route::get('/productsection', [ProductController::class, 'index'])->name('productsection');




    // === Register y Login ===
    Route::get('/login', [AuthController::class, 'login'])->name('login.form');
    Route::post('/login', [AuthController::class, 'LoginRequest'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register.form');
    Route::post('/register', [AuthController::class, 'store'])->name('register');
    
    
    
    
    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
        Route::get('/profile', function () {$cards = Auth::user()->paymentCards()->latest()->get();return view('profiles.user.profile', compact('cards'));})->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/upload-image', [ProfileController::class, 'uploadImage'])->name('profile.uploadImage');
        
        Route::get('/profile/payments', [PaymentCardController::class, 'index'])->name('payments.index');
        Route::post('/payments', [PaymentCardController::class, 'store'])->name('payments.store');
        Route::delete('/payments/{card}', [PaymentCardController::class, 'destroy'])->name('payments.destroy');

        Route::resource('addresses', AddressController::class);
        
    });
    
    
    // Logout (puedes reutilizar uno solo)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    
    
    
    // === Rutas de SuperAdmin ===
    Route::get('/superAdmin', function () {return view('profiles.admin.admin');})->name('superAdmin');
    
    //creacion empresas
    Route::post('/register-company', [CompanyController::class, 'store'])->name('register.company');
    Route::get('/superAdmin', [AdminController::class, 'showCompaniesAndUsers'])->name('superAdmin');
    
    
    
    
    Route::resource('products', ProductController::class);
    Route::get('/products', function () {return view('products');})->name('products');




    Route::middleware('auth')->group(function () {
    Route::get('/branches', [BranchController::class, 'index'])->name('branches');
    Route::post('/branchsection', [BranchController::class, 'store'])->name('branches.store');
    Route::delete('/branchsection/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
});







