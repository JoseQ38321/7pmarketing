<?php

use App\Http\Controllers\Frontend\AgencyController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ResourceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('welcome');

Route::get('contacto', [ContactController::class, 'index'])->name('contact');

Route::get('quienes-somos', [AgencyController::class, 'index'])->name('about-us');

Route::get('blog', [BlogController::class, 'index'])->name('blog');

Route::get('blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('recursos', [ResourceController::class, 'index'])->name('resource');

Route::get('recursos/{slug}', [ResourceController::class, 'show'])->name('resource.show');

