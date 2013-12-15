<?php

use clarkartists\storage\user\UserRepository as User;

class UserController extends BaseController {


	public function __construct(User $user)
	{
 		$this->beforeFilter('auth', array('except' => 'getLogin'));
     	$this->user = $user;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 **/

	public function index()
	{
		$users = $this->user->all();
        return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$s = $this->user->create(Input::all());

    	if($s->isSaved())
    	{
      	return Redirect::route('users.index')
        	->with('flash', 'The new user has been created');
   		 }

    	return Redirect::route('users.create')
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
		$user = $this->user->find($id); 
		$posts = $user->posts; 

        return View::make('users.show', compact('user', 'posts'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('users.edit');
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
      		return Redirect::route('users.show', $id)
        	->with('flash', 'The user was updated');
   		}

    return Redirect::route('users.edit', $id)
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
