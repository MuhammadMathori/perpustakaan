<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PublicController::class, 'index']);
Route::get('book-list', [PublicController::class, 'bookList']);

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
    Route::get('register', [LoginController::class, 'register']);
    Route::post('register', [LoginController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    Route::middleware('only_admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('books', [BookController::class, 'index']);
        Route::get('create-book', [BookController::class, 'create']);
        Route::post('create-book', [BookController::class, 'store']);
        Route::get('edit-book/{slug}', [BookController::class, 'edit']);
        Route::post('edit-book/{slug}', [BookController::class, 'update']);
        Route::get('delete-book/{slug}', [BookController::class, 'delete']);
        Route::get('destroy-book/{slug}', [BookController::class, 'destroy']);
        Route::get('deleted-book', [BookController::class, 'deleted']);
        Route::get('restore-book/{slug}', [BookController::class, 'restore']);

        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('create-category', [CategoryController::class, 'create']);
        Route::post('create-category', [CategoryController::class, 'store']);
        Route::get('edit-category/{slug}', [CategoryController::class, 'edit']);
        Route::put('edit-category/{slug}', [CategoryController::class, 'update']);
        Route::get('delete-category/{slug}', [CategoryController::class, 'delete']);
        Route::get('destroy-category/{slug}', [CategoryController::class, 'destroy']);
        Route::get('deleted-category', [CategoryController::class, 'deleted']);
        Route::get('restore-category/{slug}', [CategoryController::class, 'restore']);

        Route::get('users', [UserController::class, 'users']);
        Route::get('user-registered', [UserController::class, 'userRegistered']);
        Route::get('detail-user/{slug}', [UserController::class, 'detailUser']);
        Route::get('acc-user/{slug}', [UserController::class, 'acc']);
        Route::get('ban-user/{slug}', [UserController::class, 'ban']);
        Route::get('banned-user/{slug}', [UserController::class, 'banned']);
        Route::get('destroy-user', [UserController::class, 'destroy']);
        Route::get('unban-user/{slug}', [UserController::class, 'unban']);

        Route::get('bookRent', [BookRentController::class, 'index']);
        Route::post('bookRent', [BookRentController::class, 'store']);

        Route::get('rentLogs', [RentLogController::class, 'index']);
    });
});
