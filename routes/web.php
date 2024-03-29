<?php

use App\Http\Controllers\LocalizationController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\{
    ProfileController as AdminProfileController,
    VendorController as AdminVendorController,
    BrandController as AdminBrandController,
    CategoryController as AdminCategoryController,
    SubcategoryController as AdminSubcategoryController
};

use App\Http\Controllers\Vendor\{
    ProfileController as VendorProfileController
};

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/locales/{locale}', LocalizationController::class);
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('localization')->group(function () {
    Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
        Route::view('/', 'home')->name('home');
        Route::prefix('/profile')->controller(ProfileController::class)->name('profile.')->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
        });
    });

    Route::middleware(['auth', 'verified', 'role:vendor'])->prefix('/vendor')->name('vendor.')->group(function () {
        Route::view('/dashboard', 'vendor.dashboard')->name('dashboard');
        Route::prefix('/profile')->controller(VendorProfileController::class)->name('profile.')->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
        });
    });

    Route::middleware(['auth', 'verified', 'role:admin'])->prefix('/admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::prefix('/profile')->controller(AdminProfileController::class)->name('profile.')->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
        });
        Route::resource('/vendors', AdminVendorController::class)->only('index', 'show', 'destroy');
        Route::patch('/vendors/{vendor}/toggle-status', [AdminVendorController::class, 'toggleStatus'])->name('vendors.toggle-status');
        Route::resource('/brands', AdminBrandController::class);
        Route::resource('/categories', AdminCategoryController::class);
        // Route::resource('/subcategories', AdminSubcategoryController::class);
    });

    require __DIR__ . '/auth.php';
});

