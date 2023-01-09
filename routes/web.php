<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StockCategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\StockCategory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'login']);


Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Home');
        });
        Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
        Route::get('/stores/{store}', [StoreController::class, 'show'])->name('stores.show');
        Route::post('/stores', [StoreController::class, 'store'])->name('stores.store');
        Route::post('/stores/{store}', [StoreController::class, 'update'])->name('stores.update');
        Route::post('/stores/{store}/allocate', [StoreController::class, 'allocate'])->name('stores.allocate');

        Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
        Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
        Route::post('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');

        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
        Route::post('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');

        Route::get('/stock/products', [StockController::class, 'index'])->name('stocks.index');
        Route::post('/stock/products', [StockController::class, 'store'])->name('stocks.store');
        Route::get('/stock/products/{product}', [StockController::class, 'update'])->name('stocks.update');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');

        // Route::get('/login', [UserController::class, 'login'])->name('login');
        Route::get('/stock/category', [StockCategoryController::class, 'index'])->name('categories.index');
        Route::post('/stock/category', [StockCategoryController::class, 'store'])->name('categories.store');
        Route::post('/stock/category/{stockCategory}', [StockCategoryController::class, 'update'])->name('categories.update');
    });
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });
