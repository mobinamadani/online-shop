<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/home-page', function () {

    $users = ['john', 'richard', 'jason', 'jane'];

    return view('home-page', compact('users'));
});

// Route::get('/posts', [PostController::class, 'index']);

// Route::get('/users', [UserController::class, 'index']);

// Route::get('/tags', [TagController::class, 'index']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/logs', [LogController::class, 'index'])->name('logs.index');

Route::get('/register/create', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login/create', [LoginController::class, 'create'])->name('login.create');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');
Route::delete('/logout', [LoginController::class, 'destroy'])->name('logout');
