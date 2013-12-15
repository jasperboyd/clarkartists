<?php

use clarkartists\storage\post\PostRepository as Post;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct(Post $post)
	{
     	$this->post = $post;
	}

	public function index()
	{
		if(Auth::check()){

			$posts = $this->post->all();

			return View::make('home.feed', compact('posts')); 
		}

		return View::make('home.landing');
	}
}
