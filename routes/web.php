<?php

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

use App\Http\Controllers\tweetsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/profile', 'tweetsController@show');

Route::post('/home/profile', 'tweetsController@addTweet');

Route::post('/home/profile/tweetDelete', 'tweetsController@deleteTweet');

Route::get('/home/profile/editForm','tweetsController@showEditForm');

Route::post('/home/profile/tweetUpdate', 'tweetsController@updateTweet');

Route::post('/home/profile/Tweet', 'tweetsController@showSingleTweet');


