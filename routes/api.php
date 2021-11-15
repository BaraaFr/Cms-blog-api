<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Unprotected Routes
Route::get('/posts','Api\PostController@index');
Route::get('/post/{post}','Api\PostController@show');
Route::get('/post/search/{title}','Api\PostController@search');
Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');

//Protected Routes (Auth)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/post/create','Api\PostController@store');
    Route::put('/post/{post}','Api\PostController@update');
    Route::delete('/post/{post}','Api\PostController@destroy');
    Route::post('/logout','Api\AuthController@logout');
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
