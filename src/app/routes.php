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

/*
Register
*/

Route::get('register', array(
  'uses' => 'RegistrationController@index',
  'as' => 'registration.index'
));
Route::post('register', array(
  'uses' => 'RegistrationController@store',
  'as' => 'registration.store'
));

/*
Session
*/

Route::get('login', array(
  'uses' => 'SessionController@create',
  'as' => 'session.create'
));
Route::post('login', array(
  'uses' => 'SessionController@store',
  'as' => 'session.store'
));
Route::get('logout', array(
  'uses' => 'SessionController@destroy',
  'as' => 'session.destroy'
));

Route::resource('users', 'UserController'); 

Route::resource('posts', 'PostsController'); 


Route::post('{post}/comments', array(
	'before' => 'auth', 
	'uses' => 'CommentsController@store',
	'as' => 'comments.store'
));

Route::get('{post}/comments/{comment}/edit', array(
	'before' => 'auth',
	'uses' => 'CommentsController@edit', 
	'as' => 'comments.edit'
));

Route::any('{post}/comments/{comment}', array(
	'before' => 'auth', 
	'uses' => 'CommentsController@update',
	'as' => 'comments.update'
)); 

Route::resource('comments', 'CommentsController', array('except' => ['store', 'edit', 'update']));

Route::resource('bulletins', 'BulletinController'); 
