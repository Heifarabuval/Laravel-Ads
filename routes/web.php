<?php

use App\Http\Controllers\ChatController;
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

/*Route::get('/', 'App\Http\Controllers\MainController@showIndex');*/
Auth::routes(['verify' => true]);
Route::get('/home/{id?}', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('verified');
Route::get('/profile/{id?}', 'App\Http\Controllers\ProfileController@index')->name('profile')->middleware('verified');
Route::post('/profile', 'App\Http\Controllers\ProfileController@update');
Route::post('/user/delete', 'App\Http\Controllers\ProfileController@delete');
Route::get('/', 'App\Http\Controllers\AdController@index')->middleware('verified');
Route::get('/ad/update/{id}', 'App\Http\Controllers\AdController@updateForm')->middleware('verified');
Route::get('/ad/{id}', 'App\Http\Controllers\AdController@show')->middleware('verified');
Route::post('/ad/delete', 'App\Http\Controllers\AdController@delete');
Route::get('/create', 'App\Http\Controllers\AdController@form')->middleware('verified');
Route::post('/create', 'App\Http\Controllers\AdController@create')->middleware('verified');
Route::post('/update', 'App\Http\Controllers\AdController@update');
Route::get('/search', 'App\Http\Controllers\SearchController@search');


Route::get('/chat/{id}', 'App\Http\Controllers\ChatController@chat');
Route::get('/read/{id}', 'App\Http\Controllers\ChatController@read');
Route::get('/inbox/{id}', 'App\Http\Controllers\ChatController@inbox');
Route::get('/messages/{id}', 'App\Http\Controllers\ChatController@fetchMessages');
Route::get('/messages2/{id}', 'App\Http\Controllers\ChatController@fetchMessages2');
Route::get('/rooms/{id}', 'App\Http\Controllers\ChatController@fetchRoom');
Route::post('/messages', 'App\Http\Controllers\ChatController@sendMessage');
