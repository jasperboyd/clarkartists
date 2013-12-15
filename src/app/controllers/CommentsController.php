<?php

use clarkartists\storage\comments\CommentsRepository as Comment;

class CommentsController extends BaseController {


	public function __construct(Comment $comment)
	{
 		$this->beforeFilter('auth', array('except' => 'getLogin'));
     	$this->comment = $comment;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('comments.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('comments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($postid)
	{
		$post = Post::find($postid);

		$s = $this->comment->create(Input::all(), $post);

    	if($s->isSaved())
    	{
      	return Redirect::route('home.index')
        	->with('flash', 'The new user has been created');
   		 }

    	return Redirect::route('posts.create')
    	  ->withInput()
    	  ->withErrors($s->errors());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('comments.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($postid, $commentid)
	{
        $comment = $this->comment->find($commentid); 
        $post = Post::find($postid);
        return View::make('comments.edit', compact('comment', 'post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($postid, $commentid)
	{
		$s = $this->comment->update($commentid);

    	if($s->isSaved())
   		{
      		return Redirect::route('home.index')
        	->with('flash', 'The user was updated');
   		}

    return Redirect::route('comments.edit', compact('postid', 'commentid'))
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
		//
	}

}
