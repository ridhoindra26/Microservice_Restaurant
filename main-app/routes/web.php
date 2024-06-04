<?php

use App\Http\Controllers\FavoriteMenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('a');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/store', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('resto');
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('resto-details');

Route::get('/restaurants/{id}/menu', [MenuController::class, 'menuByResto'])->name('resto-menus');

Route::get('/restaurants/{id}/review', [ReviewController::class, 'reviewByResto'])->name('resto-reviews');
Route::get('/reviews/user/{userId}', [ReviewController::class, 'getReviewByUserId']);
Route::post('/store-review', [ReviewController::class, 'storeReview'])->name('reviews.store');
Route::put('/update-review/{id}', [ReviewController::class, 'updateReview']);
Route::delete('/delete-review/{id}', [ReviewController::class, 'deleteReview']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/favorite-menu', [FavoriteMenuController::class, 'favoriteByUser']);
Route::get('/user/review', [ReviewController::class, 'getReviewByUserId']);

// Route::get('/reviews/restaurant/{restaurantId}', [ReviewController::class, 'getReviewByRestaurantId']);
// Route::get('/reviews/user/{userId}', [ReviewController::class, 'getReviewByUserId']);
// Route::post('/reviews/restaurant/{restaurantId}', [ReviewController::class, 'insertReview']) ->name('reviews.store');
// Route::put('/reviews/{idReview}', [ReviewController::class, 'updateReview']);
// Route::delete('/reviews/{reviewId}', [ReviewController::class, 'deleteReview']);


Route::post('/store-favorite/{id}', [FavoriteMenuController::class, 'storeFavorite']);
Route::post('/delete-favorite/{id}', [FavoriteMenuController::class, 'deleteFavorite']);

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');
