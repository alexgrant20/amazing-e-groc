<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
})->middleware('guest')->name('index');

Route::middleware('guest')->controller(AccountController::class)->group(function () {
   Route::get('/register', 'register')->name('register');
   Route::post('/register', 'createAccount')->name('create-account');
   Route::get('/login', 'login')->name('login');
   Route::post('/login', 'authenticate')->name('authenticate');
});

Route::controller(ItemController::class)->name('item.')->group(function () {
   // VIew all product
   Route::get('/items', 'index')->name('index');

   // View Product
   Route::get('/item/{item}', 'show')->name('show');
});
Route::controller(OrderController::class)->name('order.')->prefix('/order')->group(function () {
   // Add to cart
   Route::post('', 'store')->name('store');

   // View cart (only his id)
   Route::get('', 'index')->name('index');

   // Delete from cart
   Route::delete('', 'destroy')->name('destroy');

   // Checkout
   Route::post('/checkout', 'checkout')->name('checkout');
});
Route::middleware('auth')->group(function () {
   Route::get('/logout', [AccountController::class, 'logout'])->name('logout');


   Route::controller(AccountController::class)->name('account.')->prefix('account')->group(function () {
      Route::get('/edit', 'edit')->name('edit');
      Route::patch('/update', 'update')->name('update');

      Route::middleware('role:admin')->group(function () {
         Route::get('/', 'index')->name('index');
         Route::get('/edit/role', 'editRole')->name('edit-role');
         Route::patch('/update/{account}', 'updateRole')->name('update-role');
         Route::delete('/delete', 'destory')->name('destory');
      });
   });
});
