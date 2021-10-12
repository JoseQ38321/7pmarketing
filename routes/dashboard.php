<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MediaController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ResourceController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('user', UserController::class)->names('user');
Route::resource('post', PostController::class)->names('post')->except('show');
Route::resource('resource', ResourceController::class)->names('resource')->except('show');
Route::resource('role', RoleController::class)->names('role');
Route::resource('categories', CategoryController::class)->names('categories');

Route::get('message/create/{id?}', [MessageController::class, 'create'])->name('message.create');
Route::get('message/inbox', [MessageController::class, 'inbox'])->name('message.inbox');
Route::get('message/outbox', [MessageController::class, 'outbox'])->name('message.outbox');
Route::post('message/create', [MessageController::class, 'store'])->name('message.store');
Route::get('messages/{id}', [MessageController::class, 'show'])->name('message.show');

Route::get('media', [MediaController::class, 'index'])->name('media');
Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');

