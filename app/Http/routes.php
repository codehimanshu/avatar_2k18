<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Auth Routes
Route::get('/', 'LoginController@index');
Route::get('/facebook/callback','LoginController@callback');
Route::get('/logout','LoginController@logout');

// Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/post', 'HomeController@post');
Route::get('/policy', 'LoginController@policy');