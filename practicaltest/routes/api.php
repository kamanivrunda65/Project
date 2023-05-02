<?php

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
Route::get('/allproduct', [App\Http\Controllers\ProductController::class, 'show']);
Route::get('/addcart/{id}', [App\Http\Controllers\CartController::class, 'store']);
Route::get('/dropcart/{id}', [App\Http\Controllers\CartController::class, 'destroy']);
Route::get('/dropalldata', [App\Http\Controllers\CartController::class, 'deleteall']);
Route::get('/cartdata', [App\Http\Controllers\CartController::class, 'show']);
