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

Route::get('/', function () {
    return view('welcome');
});
Route::get('adminlogin','loginController@index');
Route::get('adminlogout','loginController@logout');
Route::post('checkvalidate','loginController@checkvalidate');
Route::get('dashboard/dashboard','loginController@dashboard');
Route::resource('category','categoryController');
Route::resource('product','productsController');
