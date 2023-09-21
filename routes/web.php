<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SignInController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Contact Route
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Login Route 
Route::get('/sign_in', [SignInController::class, 'index'])->name('signIn.index');

// Shop Route
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

// Cart Route
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Product Route
Route::get('/product/{product}', [ProductController::class, 'index'])->name('product.index');

// Registeration Route
Route::get('/sign_up', [RegisterController::class, 'index'])->name('register.index');

// Newsletter Mail Route
Route::post('/newslettermail', [NewsletterController::class, 'store'])->name('newsletter.store');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
