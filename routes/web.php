<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  // return view('/');
})->name('index');

Route::middleware('guest')->controller(AccountController::class)->group(function () {
  Route::get('/register', 'register')->name('register');
  Route::post('/sign-up', 'signUp')->name('sign-up');
  Route::get('/login', 'register')->name('register');
  Route::post('/sign-in', 'signIn')->name('sign-in');
});

Route::middleware('auth')->group(function () {

  Route::controller(ProductController::class)->name('product.')->group(function () {
    // VIew all product
    Route::get('/product', 'index')->name('index');

    // View Product
    Route::get('/product/{product}', 'show')->name('show');
  });

  Route::controller(CartController::class)->name('cart.')->group(function () {
    // Add to cart
    Route::post('/cart', 'show')->name('store');

    // View cart (only his id)
    Route::get('/cart', 'index')->name('index');

    // Delete from cart
    Route::delete('/cart/{product}', 'destroy')->name('destroy');

    // Checkout
    Route::post('/checkout', 'checkout')->name('checkout');
  });

  Route::controller(AccountController::class)->name('account')->group(function () {
    Route::get('/edit', 'edit')->name('edit');
    Route::patch('/update', 'update')->name('update');

    Route::middleware('role:admin')->group(function () {
      Route::get('/edit/role', 'editRole')->name('edit-role');
      Route::patch('/update/{account}', 'updateRole')->name('update-role');
    });
  });
});
