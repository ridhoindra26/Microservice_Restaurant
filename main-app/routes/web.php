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
    return redirect('/restaurants');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/store', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login/auth', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants');
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('resto-details');

Route::get('/restaurants/{id}/menu', [MenuController::class, 'menuByResto'])->name('resto-menus');

Route::get('/restaurants/{id}/review', [ReviewController::class, 'reviewByResto'])->name('resto-reviews');
Route::post('/store-review', [ReviewController::class, 'storeReview']);
Route::put('/update-review/{id}', [ReviewController::class, 'updateReview']);
Route::delete('/delete-review/{id}', [ReviewController::class, 'deleteReview']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/favorite-menu', [FavoriteMenuController::class, 'favoriteByUser']);
Route::get('/user/review', [ReviewController::class, 'reviewByUser']);

Route::post('/store-favorite/{id}', [FavoriteMenuController::class, 'storeFavorite'])->middleware('auth');
Route::delete('/delete-favorite/{id}', [FavoriteMenuController::class, 'deleteFavorite'])->middleware('auth');