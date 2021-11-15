<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/category/{id}','WebController@category')->name('web.category');
Route::get('/post/{slug}','WebController@post')->name('web.post');
Route::get('/page/{slug}','WebController@page')->name('web.page');
Route::get('/contact','WebController@showContactForm')->name('contact.form');
Route::post('/contact','WebController@contact')->name('contact.submit');
//Register wall Routes
Route::get('/regwall','Auth\RegWallController@showwallform')->name('wall.form');
Route::post('/regwall','Auth\RegWallController@wall')->name('wall.submit');


Route::get('/', 'WebController@index')->name('home');

Route::get('/latest','HomeController@index');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('categories','CategoryController');
    Route::resource('posts','PostController');
    Route::resource('pages','PageController');
    Route::resource('galleries','GalleryController');
});
