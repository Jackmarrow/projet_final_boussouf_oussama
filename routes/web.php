<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\Admin\AdminInfoController;
use App\Http\Controllers\Admin\AllProductController;
use App\Http\Controllers\Admin\AllUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MailBoxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\Webmaster\ProductController as WebmasterProductController;
use App\Http\Controllers\Webmaster\WebmasterDashboardController;
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

// Add to cart Route
Route::post('/product/add_to_cart/{product}', [AddToCartController::class, 'store'])->name('addToCart.store');

// Send Mail to Admin Route
Route::post('/contact/send_mail', [ContactController::class, 'store'])->name('sendMail.store');

// Increment and decrement Route
Route::put('/cart/{panier}/increment', [CartController::class, 'increment'])->name('cart.increment');
Route::put('/cart/{panier}/decrement', [CartController::class, 'decrement'])->name('cart.decrement');

// Admin Routes 
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('adminDashboard.index');
    Route::get('/admin/all_users', [AllUserController::class, 'index'])->name('allUsers.index');
    Route::get('/admin/products', [AllProductController::class, 'index'])->name('allProduct.index');
    Route::get('/admin/mail_box', [MailBoxController::class, 'index'])->name('mailBox.index');
    Route::get('/admin/admin_info', [AdminInfoController::class, 'index'])->name('adminInfo.index');
    Route::put('/admin/admin_info/{info}/update', [AdminInfoController::class,'update'])->name('adminInfo.update');
    Route::put('/admin/products/{product}', [AllProductController::class, 'update'])->name('product.update');
    Route::post('/admin/products/add_product', [AllProductController::class, 'store'])->name('product.store');
    Route::delete('/admin/products/{product}/delete', [AllProductController::class, 'destroy'])->name('product.destroy');
    Route::put('/admin/all_users/{user}/update', [AllUserController::class, 'changeRole'])->name('allUsers.changerole');
});


// Webmaster Routes
Route::middleware(['auth', 'role:webmaster'])->group(function(){
    Route::get('/webmaster/dashboard',[WebmasterDashboardController::class, 'index'])->name('webmasterDashboard.index');
    Route::get('/webmaster/products', [WebmasterProductController::class, 'index'])->name('webmasterProduct.index');
    Route::put('/webmaster/products/{product}', [WebmasterProductController::class, 'update'])->name('product.update');
    Route::post('/webmaster/products/add_product', [WebmasterProductController::class, 'store'])->name('product.store');
    Route::delete('/webmaster/products/{product}/delete', [WebmasterProductController::class, 'destroy'])->name('product.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
