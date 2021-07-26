<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\HelloWordController;

use App\Http\Controllers\UserController;
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

Route::get('/', HelloWordController::class)->name('principal');

Route::resource('/user', UserController::class);

Route::resource('/post', PostController::class);

Route::resource('/categories', CategoryController::class);