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

Route::get('myOrders','userProfileController@myOrders');

Route::get('userProfile/changePassword/{id}','userProfileController@changePassword');

Route::Post('userProfile/updatePassword/{id}','userProfileController@updatePassword');

Route::resource('userProfile','userProfileController');

Route::get('contact','homeController@contact');

Route::get('showProducts','homeController@showProducts');

Route::get('register','homeController@register');

Route::get('singleProduct/{id}','homeController@singleProduct');

Route::get('productByCategories/{category_name}','homeController@productByCategories');

Route::post('checkforExitingEmail','homeController@checkforExitingEmail');

Route::get('userFeedback','peopleFeedbackController@index');

Route::post('DeletePeopleFeedback/{id}','peopleFeedbackController@DeletePeopleFeedback');

Route::get('forgotPassword','loginController@forgotPassword');

Route::get('adminlogin','loginController@index');

Route::get('adminlogout','loginController@logout');

Route::post('checkvalidate','loginController@checkvalidate');

Route::get('dashboard','loginController@dashboard');

Route::resource('category','categoryController');

Route::resource('product','productsController');

Route::resource('user','customerController');

Route::resource('contactDetails','siteDetailController');

Route::resource('userOrders','userOrdersController');

Route::post('add_to_cart','homeController@add_to_cart');

Route::post('remove_from_cart','homeController@remove_from_cart');

Route::get('reviewAndShop','homeController@reviewAndShop');

Route::post('order','homeController@order');

Route::auth();
Route::get('/home', 'HomeController@index');
