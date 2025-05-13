<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Seller\OrderManagementController;

// ✅ Correct: Public homepage
Route::get('/', [PublicProductController::class, 'index'])->name('public.products.index');

// ❌ DELETE or COMMENT OUT this:
// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\RedirectController;

Route::get('/dashboard', [RedirectController::class, 'home'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserManagementController::class, 'index'])->name('admin.users.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Group routes that require login
Route::middleware(['auth'])->group(function () {
    // Seller Product Management Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
	Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
	Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
	Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
	Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
	Route::middleware(['auth'])->group(function () {
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
	Route::middleware(['auth'])->group(function () {
    Route::get('/seller/orders', [OrderManagementController::class, 'index'])->name('seller.orders.index');
		});
	});
});

require __DIR__.'/auth.php';
