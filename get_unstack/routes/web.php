<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', [App\Http\Controllers\IndexController::class, 'redirect']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\IndexController::class, 'index']);
Route::get('/contact', [App\Http\Controllers\IndexController::class, 'contact'])->name('contact');
Route::get('/question', [App\Http\Controllers\QuestionController::class, 'index'])->name('askquestion');
Route::get('/allquestion', [App\Http\Controllers\QuestionController::class, 'allquestion'])->name('allquestion');
Route::get('/questiondetail/{id}', [App\Http\Controllers\QuestionController::class, 'singlequestion'])->name('singlequestion');
Route::get('/profile/{name}', [App\Http\Controllers\ProfileController::class, 'profile']);
Route::get('/setting', [App\Http\Controllers\ProfileController::class, 'setting'])->name('setting');
Route::get('/forgotpassword', [App\Http\Controllers\ProfileController::class, 'forgotpassword'])->name('forgotpassword');
Route::get('/resetpassword', [App\Http\Controllers\ProfileController::class, 'resetpassword'])->name('resetpassword');
Route::get('/changepassword', [App\Http\Controllers\ProfileController::class, 'change'])->name('changepassword');
Route::get('/notification', [App\Http\Controllers\ProfileController::class, 'notification'])->name('notification');
Route::get('/post', [App\Http\Controllers\BlogController::class, 'post'])->name('post');
Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'blogs'])->name('blogs');
Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'singleblog'])->name('singleblog');
Route::get('/category/{id}', [App\Http\Controllers\BlogController::class, 'categoryblog']);



Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admindashboard');
Route::get('/questiontable', [App\Http\Controllers\AdminController::class, 'questiontable'])->name('questiontable');
Route::get('/blogtable', [App\Http\Controllers\AdminController::class, 'blogtable'])->name('blogtable');
Route::get('/addcategory', [App\Http\Controllers\AdminController::class, 'category'])->name('addcategory');




Route::post('/blogs', [App\Http\Controllers\BlogController::class, 'searchblog']);
Route::post('/question', [App\Http\Controllers\QuestionController::class, 'store']);
Route::post('/setting', [App\Http\Controllers\ProfileController::class, 'updateuser']);
Route::post('/post', [App\Http\Controllers\BlogController::class, 'store']);
Route::post('/blogtable', [App\Http\Controllers\BlogController::class, 'search']);
Route::post('/questiontable', [App\Http\Controllers\QuestionController::class, 'search']);
Route::post('/questiondetail/{id}', [App\Http\Controllers\AnswerController::class, 'store']);
Route::post('/changepassword', [App\Http\Controllers\ProfileController::class, 'changepassword']);
Route::post('/changeemail', [App\Http\Controllers\ProfileController::class, 'changeemail']);

?>
