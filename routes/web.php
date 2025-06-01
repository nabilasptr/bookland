<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderitemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;

Route::get('/category-page',[FrontendController::class, 'index'])->name('page.category');
Route::get('/',[FrontendController::class, 'home'])->name('page.home');

Route::get('/detail', function () {
    return view('details');
});



Route::get('/search-books', [FrontendController::class, 'searchBooks'])->name('frontend.searchBooks');

Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('books', BookController::class);

    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::delete('/users/{id}',[UserController::class,'destroy'])->name('users.destroy');
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updaterole');


    Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::get('/orderitems',[OrderitemController::class,'index'])->name('orderitems.index');



});

Route::get('/filter', [FrontendController::class, 'filter'])->name('books.filter');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::post('/favorite/{bookId}', [FavoriteController::class, 'toggle'])->name('favorite.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

});