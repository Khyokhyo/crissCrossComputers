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

Route::get('/', array('uses' => 'HomeController@getLogin', 'as' => 'login'));
Route::post('loginPost', array('uses' => 'HomeController@postLogin', 'as' => 'postLogin'));

Route::get('register', array('uses' => 'HomeController@getRegister', 'as' => 'register'));
Route::post('registerPost', array('uses' => 'HomeController@postRegister', 'as' => 'postRegister'));


Route::group( ['middleware' => 'auth'], function(){

	Route::get('home', array('uses' => 'HomeController@home', 'as' => 'home'));

	Route::get('transactions', array('uses' => 'HomeController@transactions', 'as' => 'transactions'));

	Route::get('edit', array('uses' => 'HomeController@edit', 'as' => 'edit'));
	Route::get('putEdit', array('uses' => 'HomeController@putEdit', 'as' => 'putEdit'));

	Route::get('editPassword', array('uses' => 'HomeController@editPassword', 'as' => 'editPassword'));
	Route::get('putEditPassword', array('uses' => 'HomeController@putEditPassword', 'as' => 'putEditPassword'));

	Route::get('logout', array('uses' => 'HomeController@logout', 'as' => 'logout'));

});