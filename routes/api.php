<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/update/{id}', [CategoryController::class, 'update']);
Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);












//Route::post('/register', [RegisterController::class, 'store']);
//Route::post('/login', [LoginController::class, 'store']);
//
//Route::middleware('auth:sanctum')->group(function () {
//
//    Route::get('/products', [ProductController::class, 'index']);
//    Route::post('/products/store', [ProductController::class, 'store']);
//    Route::get('/products/{product}', [ProductController::class, 'show']);
//
////category
////    Route::get('/categories', [CategoryController::class, 'index']);
//    Route::post('/categories', [CategoryController::class, 'store']);
////    Route::put('/categories/{category}', [CategoryController::class, 'update']);
//    Route::patch('/categories/{category}', [CategoryController::class, 'update']);
//    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
//    Route::get('/categories/{category}', [CategoryController::class, 'show']);
//
////post
//    Route::get('/posts', [PostController::class, 'index']);
//    Route::post('/posts', [PostController::class, 'store']);
//    Route::patch('/posts/{id}', [PostController::class, 'update']);
//    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
//
////logout
//    Route::delete('/logout', [LoginController::class, 'destroy']);
//
//});
//


