<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'registeruser']);
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginuser']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/addproduct', [App\Http\Controllers\ProductController::class, 'addproduct'])->name('addproduct');
Route::get('/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::post('/addproduct', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/showproduct', [App\Http\Controllers\ProductController::class, 'showproduct'])->name('showproduct');
Route::post('/updateproduct', [App\Http\Controllers\ProductController::class, 'update'])->name('updateproduct');
Route::post('/products/{id}/delete', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/showproduct', [App\Http\Controllers\ProductController::class, 'search'])->name('search');