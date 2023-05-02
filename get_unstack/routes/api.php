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
Route::get('/tags', [App\Http\Controllers\TagsController::class, 'show']);
Route::get('/trendingpost', [App\Http\Controllers\BlogController::class, 'trending']);
Route::get('/blogsection', [App\Http\Controllers\BlogController::class, 'blogsection']);
Route::get('/trendingquestion', [App\Http\Controllers\QuestionController::class, 'trending']);
Route::get('/achievement', [App\Http\Controllers\IndexController::class, 'achievement']);
Route::get('/notification', [App\Http\Controllers\ProfileController::class, 'notificationdata']);



Route::post('/searchquestion', [App\Http\Controllers\QuestionController::class, 'searchquestion']);
Route::post('/qcomment', [App\Http\Controllers\QuestionCommentController::class, 'store']);
Route::post('/bcomment', [App\Http\Controllers\BlogCommentController::class, 'store']);
Route::post('/acomment', [App\Http\Controllers\AnswerCommentController::class, 'store']);
Route::post('/bsubcomment', [App\Http\Controllers\BlogSubCommentController::class, 'store']);
Route::post('/searchblog', [App\Http\Controllers\BlogController::class, 'searchblog']);
Route::post('/postcategory', [App\Http\Controllers\CategoryController::class, 'store']);
Route::post('/sendpasswordmail',[App\Http\Controllers\ProfileController::class,'sendpasswordmail']);
Route::post('/review',[App\Http\Controllers\ProfileController::class,'review']);

Route::get('/userblogdata', [App\Http\Controllers\ProfileController::class, 'userblog']);
Route::get('/userquestion', [App\Http\Controllers\ProfileController::class, 'userquestion']);
Route::get('/useranswers', [App\Http\Controllers\ProfileController::class, 'useranswers']);
Route::get('/usersavedquestion/{userid}', [App\Http\Controllers\CartController::class, 'usersavedquestion']);
Route::get('/removequestion/{qcid}', [App\Http\Controllers\CartController::class, 'cartquestiondrop']);
Route::get('/usersavedblog/{userid}', [App\Http\Controllers\BlogcartController::class, 'usersavedblog']);
Route::get('/removeblog/{bcid}', [App\Http\Controllers\BlogcartController::class, 'cartblogdrop']);
Route::get('/deletereview/{uid}', [App\Http\Controllers\ProfileController::class, 'dropreview']);
Route::get('/linkopen/{id}', [App\Http\Controllers\ProfileController::class, 'linkopen']);




Route::get('/deletequestion/{id}', [App\Http\Controllers\QuestionController::class, 'destroy']);
Route::get('/deleteblog/{id}', [App\Http\Controllers\BlogController::class, 'destroy']);
Route::get('/deleteuserblog/{id}', [App\Http\Controllers\BlogController::class, 'destroy']);
Route::get('/deleteanswer/{id}', [App\Http\Controllers\AnswerController::class, 'destroy']);
Route::get('/deletesubcomment/{id}', [App\Http\Controllers\BlogSubCommentController::class, 'destroy']);
Route::get('/deletecomment/{id}', [App\Http\Controllers\BlogCommentController::class, 'destroy']);

Route::get('/answervote/{aid}/{uid}', [App\Http\Controllers\AnswervoteController::class, 'store']);
Route::get('/rightanswer/{aid}/{qid}', [App\Http\Controllers\AnswerController::class, 'rightanswer']);
Route::get('/wronganswer/{aid}/{qid}', [App\Http\Controllers\AnswerController::class, 'wronganswer']);
Route::get('/questionvote/{qid}/{uid}', [App\Http\Controllers\QuestionvoteController::class, 'store']);
Route::get('/categorystatus/{id}/{status}', [App\Http\Controllers\CategoryController::class, 'statuschange']);
Route::get('/cartquestion/{qid}/{uid}', [App\Http\Controllers\CartController::class, 'cartquestionstore']);
Route::get('/removecartquestion/{qid}/{uid}', [App\Http\Controllers\CartController::class, 'cartquestiondrop']);
Route::get('/saveblog/{bid}/{uid}', [App\Http\Controllers\BlogcartController::class, 'saveblog']);
Route::get('/removeblog/{bid}/{uid}', [App\Http\Controllers\BlogcartController::class, 'dropblog']);

