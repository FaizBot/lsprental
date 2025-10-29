    <?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CustomerController;
    use App\Http\Controllers\MobilController;
    use App\Http\Controllers\RentalController;
    use App\Http\Controllers\PaymentController;
    use App\Http\Controllers\DashboardController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index_admin'])->name('admin.dashboard');

        // Customer Routes
        Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');
        Route::post('/customer/create', [CustomerController::class, 'store'])->name('admin.customer.store');
        Route::put('/customer/update/{customer}', [CustomerController::class, 'update'])->name('admin.customer.update');
        Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('admin.customer.destroy');

        // Mobil Routes
        Route::get('/mobil', [MobilController::class, 'index'])->name('admin.mobil');
        Route::post('/mobil/create', [MobilController::class, 'store'])->name('admin.mobil.store');
        Route::put('/mobil/update/{mobil}', [MobilController::class, 'update'])->name('admin.mobil.update');
        Route::delete('/mobil/{mobil}', [MobilController::class, 'destroy'])->name('admin.mobil.destroy');

        // Rental Routes
        Route::get('/rental', [RentalController::class, 'admin_index'])->name('admin.rental');
        Route::get('/rental/create', [RentalController::class, 'admin_create'])->name('admin.rental.create');
        Route::post('/rental/store', [RentalController::class, 'admin_store'])->name('admin.rental.store');
        Route::get('/rental/show/{rental}', [RentalController::class, 'admin_show'])->name('admin.rental.show');
        Route::delete('/rental/{rental}', [RentalController::class, 'admin_destroy'])->name('admin.rental.destroy');

        // Payment Route
        Route::get('/payment', [PaymentController::class, 'admin_index'])->name('admin.payment');
        Route::get('/payment/create/{rental}', [PaymentController::class, 'admin_create'])->name('admin.payment.create');
        Route::post('/payment/store/{rental}', [PaymentController::class, 'admin_store'])->name('admin.payment.store');
        Route::get('/payment/show/{payment}', [PaymentController::class, 'admin_show'])->name('admin.payment.show');
        Route::delete('/payment/{rental}', [PaymentController::class, 'admin_destroy'])->name('admin.payment.destroy');
    });

    Route::middleware(['auth', 'role:customer'])->group(function () {
        Route::get('/dashboardcus', [DashboardController::class, 'index'])->name('cus.dashboard');
    });
