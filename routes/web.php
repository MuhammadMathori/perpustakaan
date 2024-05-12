<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
    Route::get('register', [LoginController::class, 'register']);
    Route::post('register', [LoginController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('only_admin');
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');
    Route::get('users', [UserController::class, 'users'])->middleware('only_admin');
    Route::get('books', [BookController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('create-category', [CategoryController::class, 'create']);
    Route::post('create-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{slug}', [CategoryController::class, 'edit']);
    Route::put('edit-category/{slug}', [CategoryController::class, 'update']);
    Route::get('delete-category/{slug}', [CategoryController::class, 'delete']);
    Route::get('destroy-category/{slug}', [CategoryController::class, 'destroy']);
    Route::get('deleted-category', [CategoryController::class, 'deleted']);
    Route::get('restore-category/{slug}', [CategoryController::class, 'restore']);
    Route::get('rentlogs', [RentLogController::class, 'index']);
});
