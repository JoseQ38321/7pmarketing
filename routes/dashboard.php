<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('user', UserController::class)->names('user');
Route::resource('post', PostController::class)->names('post');
Route::resource('role', RoleController::class)->names('role');

Route::get('message/create/{id}', [MessageController::class, 'create'])->name('message.create');
Route::post('message/create', [MessageController::class, 'store'])->name('message.store');
Route::get('messages/{id}', [MessageController::class, 'show'])->name('message.show');

