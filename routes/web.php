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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/manifest.json', function () {
	$public_path = public_path();
	$url = $public_path.'/manifest.json';
	return response()->file($url);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
