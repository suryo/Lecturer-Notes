<?php

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


use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;

// Public Routes
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('product.index');
Route::get('/produk/{id}', [ProductController::class, 'detail'])->name('product.detail');

// Auth Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Routes (Customer)
Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    
    Route::get('/pesanan', [OrderController::class, 'index'])->name('order.index');
    Route::get('/pesanan/{id}', [OrderController::class, 'show'])->name('order.show');
    
    Route::get('/profil', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profil/alamat', [ProfileController::class, 'address'])->name('profile.address');
});

// Admin Routes
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // ... future admin routes (produk, kategori, etc.)
});
