<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostSlugController;
use App\Http\Controllers\ReadPostController;
use App\Http\Controllers\SearchPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', IndexController::class)->name('index');

Route::get('/search', SearchPostController::class)->name('search');
Route::get('/read/{post:slug}', ReadPostController::class)->name('read');

// auth
Route::post('/login', LoginController::class)->name('login');
Route::post('/logout', LogoutController::class)->name('logout');

// admin
Route::get('/admin', AdminDashboardController::class)->name('admin.dashboard');
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');

// posts
Route::resource('/posts', PostController::class);
Route::get('/slug', PostSlugController::class)->name('slug');