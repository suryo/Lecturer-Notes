<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- PUBLIC ROUTES ---
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/detail/{id}', [ProductController::class, 'detail'])->name('produk.detail');

// --- AUTH ROUTES ---
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- MEMBER ROUTES (Protected) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    
    Route::prefix('member')->group(function () {
        Route::get('/profil', [ProfileController::class, 'index'])->name('member.profil');
        Route::get('/pesanan', [OrderController::class, 'index'])->name('member.pesanan');
    });
});

// --- ADMIN ROUTES (Protected & Admin Only) ---
// Note: Middleware 'admin' should be implemented later
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/produk', [AdminProductController::class, 'index'])->name('admin.produk');
    Route::get('/pesanan', [AdminOrderController::class, 'index'])->name('admin.pesanan');
    Route::get('/member', [AdminMemberController::class, 'index'])->name('admin.member');
});
