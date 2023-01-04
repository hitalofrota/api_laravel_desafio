<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/category', [CategoryController::class, 'index']);
// Route::get('/category/{id}', [CategoryController::class, 'show']);
// Route::post('/category', [CategoryController::class, 'store']);
// Route::put('/category/{id}', [CategoryController::class, 'update']);
// Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

// Route::get('/product', [ProductController::class, 'index']);
// Route::get('/product/{id}', [ProductController::class, 'show']);
// Route::post('/product', [ProductController::class, 'store']);
// Route::put('/product/{id}', [ProductController::class, 'update']);
// Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('product', ProductController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);