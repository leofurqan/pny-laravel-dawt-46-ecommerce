<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebsiteController;
use App\Http\Middleware\CartMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

    //Routes after login
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });
});

Route::get('/products/print', [ProductController::class, 'printProducts'])->name('products.print');

Route::name('website.')->group(function () {
    Route::middleware([CartMiddleware::class])->group(function () {
        Route::get('/', [WebsiteController::class, 'index'])->name('index');
        Route::get('/shop', [WebsiteController::class, 'shop'])->name('shop');
        Route::get('/about', [WebsiteController::class, 'about'])->name('about');
        Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
        Route::get('/cart', [WebsiteController::class, 'cart'])->name('cart');
        Route::get('/clearCart', [WebsiteController::class, 'clearCart'])->name('clearCart');
        Route::post('/addToCart', [WebsiteController::class, 'addToCart'])->name('addToCart');
        Route::get('/checkout', [WebsiteController::class, 'checkout'])->name('checkout');
        Route::get('/blogs', [WebsiteController::class, 'blogs'])->name('blogs');
    });
});
