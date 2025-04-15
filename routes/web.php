<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'index'])
    ->name('welcome')
    ->middleware('guest');

Route::middleware(['auth', 'role:0'])->group(function () {

    Route::get('/home', [DashboardController::class, 'home'])->name('home');
    Route::get('/about', [DashboardController::class, 'about'])->name('about');
    Route::get('/terms-condition', [DashboardController::class, 'terms'])->name('terms-condition');
    Route::get('/shippingInfo', [DashboardController::class, 'ship'])->name('shippingInfo');
    Route::get('/privacy', [DashboardController::class, 'privacy'])->name('privacy');
    Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
    Route::get('/cart', [DashboardController::class, 'cart'])->name('cart');
    Route::get('/checkout', [DashboardController::class, 'checkout'])->name('checkout');
    Route::get('/returns', [DashboardController::class, 'returns'])->name('returns');

});

// Route::get('/vegefruits/create', function () {
//     return view('vegefruits.create');
// });



