<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/questiondata', [App\Http\Controllers\QuestionController::class, 'show']);
Route::get('/blogdata', [App\Http\Controllers\BlogController::class, 'show']);
Route::get('/blogtabledata', [App\Http\Controllers\BlogController::class, 'showtable']);
Route::get('/questioncomment', [App\Http\Controllers\QuestionCommentController::class, 'show']);
Route::get('/blogcomment', [App\Http\Controllers\BlogCommentController::class, 'show']);
Route::get('/blogsubcomment', [App\Http\Controllers\BlogSubCommentController::class, 'show']);
Route::get('/answercomment', [App\Http\Controllers\AnswerCommentController::class, 'show']);
Route::get('/answer', [App\Http\Controllers\AnswerController::class, 'show']);
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'show']);


Route::post('/qcomment', [App\Http\Controllers\QuestionCommentController::class, 'store']);
Route::post('/bcomment', [App\Http\Controllers\BlogCommentController::class, 'store']);
Route::post('/acomment', [App\Http\Controllers\AnswerCommentController::class, 'store']);
Route::post('/bsubcomment', [App\Http\Controllers\BlogSubCommentController::class, 'store']);
Route::post('/searchblog', [App\Http\Controllers\BlogController::class, 'searchblog']);
Route::post('/postcategory', [App\Http\Controllers\CategoryController::class, 'store']);



Route::get('/deletequestion/{id}', [App\Http\Controllers\QuestionController::class, 'destroy']);
Route::get('/deleteblog/{id}', [App\Http\Controllers\BlogController::class, 'destroy']);
Route::get('/deleteanswer/{id}', [App\Http\Controllers\AnswerController::class, 'destroy']);

Route::get('/answervote/{aid}/{uid}', [App\Http\Controllers\AnswervoteController::class, 'store']);
Route::get('/questionvote/{qid}/{uid}', [App\Http\Controllers\QuestionvoteController::class, 'store']);
Route::get('/categorystatus/{id}/{status}', [App\Http\Controllers\CategoryController::class, 'statuschange']);


