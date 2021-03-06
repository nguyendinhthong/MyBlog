<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('main', function () {
    return view('main');
});

Route::get('about','PagesController@getAbout');
Route::get('contact','PagesController@getcontact');
Route::get('hello','PagesController@getHello');

Route::resource('posts','PostController');
Route::get('index1','PostController@index1');