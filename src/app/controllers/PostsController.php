<?php

use clarkartists\storage\post\PostRepository as Post;

class PostsController extends BaseController {


	public function __construct(Post $post)
	{
 		$this->beforeFilter('auth', array('except' => 'getLogin'));
     	$this->post = $post;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('posts.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$s = $this->post->create(Input::all());

    	if($s->isSaved())
    	{
      	return Redirect::route('home.index')
        	->with('flash', 'The new user has been created');
   		 }

    	return Redirect::route('posts.create')
    	  ->withInput()
    	  ->withErrors($s->errors());
 		 
	}

	public function vote($id){ 

		$post = $this->post->vote($id);
		return View::make('posts.show', compact('post'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('posts.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->post->find($id); 
        return View::make('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$s = $this->user->update($id);

    	if($s->isSaved())
   		{
      		return Redirect::route('posts.show', $id)
        	->with('flash', 'The user was updated');
   		}

    return Redirect::route('posts.edit', $id)
      ->withInput()
      ->withErrors($s->errors());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$posts = $this->post->delete($id);

		return View::make('posts.index', compact('posts')); 
	}

}
