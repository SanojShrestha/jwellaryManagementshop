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

// Route::get('userProfile/viewOrders','userProfileController@viewOrders');

Route::get('/','homeController@index');

Route::get('userProfile/changePassword/{id}','userProfileController@changePassword');

Route::Post('userProfile/updatePassword/{id}','userProfileController@updatePassword');

Route::get('about','homeController@about');

Route::get('contact','homeController@contact');

Route::get('showProducts','homeController@showProducts');

Route::get('register','homeController@register');

Route::get('single','homeController@single');

Route::post('checkforExitingEmail','homeController@checkforExitingEmail');

Route::get('forgotPassword','loginController@forgotPassword');

Route::get('adminlogin','loginController@index');

Route::get('adminlogout','loginController@logout');

Route::post('checkvalidate','loginController@checkvalidate');

Route::get('dashboard/dashboard','loginController@dashboard');

Route::resource('category','categoryController');

Route::resource('product','productsController');

Route::resource('user','customerController');

Route::resource('contactDetails','siteDetailController');

Route::auth();
Route::get('/home', 'HomeController@index');
