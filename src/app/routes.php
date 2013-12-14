<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'uses' => 'HomeController@index',
	'as' => 'home.index'
));

Route::get('feed', array(
	'before' => 'auth', 
	'uses' => 'HomeController@feed', 
	'as' => 'home.feed'
)); 

Route::resource('registration', 'RegistrationController'); 
Route::resource('user', 'UserController'); 
