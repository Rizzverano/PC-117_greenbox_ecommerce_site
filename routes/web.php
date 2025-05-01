<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group
| assigned the "web" middleware group. Enjoy building your web app!
|
*/

// Public Route
Route::get('/', [DashboardController::class, 'index'])
    ->name('welcome')
    ->middleware('guest');

// Authenticated User Routes (role:0)
Route::middleware(['auth', 'role:0'])->group(function () {

    // Dashboard
    Route::get('/home', [DashboardController::class, 'home'])->name('home');

    // Shop Routes
    Route::prefix('shop')->group(function () {
        Route::get('/', [ShopController::class, 'shop'])->name('shop');
        Route::get('/filter', [ShopController::class, 'filter'])->name('shop.filter');
    });

    // Cart & Checkout
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::get('/checkout', [DashboardController::class, 'checkout'])->name('checkout');

    // Static Pages
    Route::get('/about', [DashboardController::class, 'about'])->name('about');
    Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
    Route::get('/shippingInfo', [DashboardController::class, 'ship'])->name('shippingInfo');
    Route::get('/terms-condition', [DashboardController::class, 'terms'])->name('terms-condition');
    Route::get('/privacy', [DashboardController::class, 'privacy'])->name('privacy');
    Route::get('/returns', [DashboardController::class, 'returns'])->name('returns');
});

// Route::get('/vegefruits/create', function () {
//     return view('vegefruits.create');
// });

