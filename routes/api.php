<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderitemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;

/**
 * Public API Routes
 */
Route::get('/books/new-release', [FrontendController::class, 'newRelease']);
Route::get('/category-page', [FrontendController::class, 'index']);
Route::get('/filter', [FrontendController::class, 'filter']);
Route::get('/search-books', [FrontendController::class, 'searchBooks']);
Route::get('/detail', fn() => response()->json(['message' => 'Detail page placeholder for API.']));
Route::get('/', [FrontendController::class, 'home']);

/**
 * Authentication Routes
 */
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/auth/logout', [AuthController::class, 'logout']);

/**
 * Admin-only API Routes
 */
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    // Books & Categories
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('books', BookController::class);

    // Users
    Route::get('/users', [UserController::class, 'index']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole']);

    // Orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus']);
    Route::get('/orderitems', [OrderitemController::class, 'index']);
});

/**
 * Authenticated User Routes
 */
Route::middleware('auth:sanctum')->group(function () {
    // Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::patch('/cart/{id}', [CartController::class, 'update']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);
    Route::post('/checkout', [CartController::class, 'checkout']);

    // Book detail
    Route::get('/books/{book}', [BookController::class, 'show']);

    // Favorites
    Route::post('/favorite/{bookId}', [FavoriteController::class, 'toggle']);
    Route::get('/favorites', [FavoriteController::class, 'index']);
});
