<?php

use clarkartists\storage\bulletin\BulletinRepository as Bulletin;

class BulletinController extends BaseController {

	
	public function __construct(Bulletin $bulletin)
	{
 		$this->beforeFilter('auth', array('except' => 'getLogin'));
     	$this->bulletin = $bulletin;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bulletins = $this->bulletin->all(); 
        return View::make('bulletin.index', compact('bulletins'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('bulletin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$s = $this->bulletin->create(Input::all());

    	if($s->isSaved())
    	{
      	return Redirect::route('bulletins.index')
        	->with('flash', 'The new user has been created');
   		 }

    	return Redirect::route('bulletins.create')
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
        return View::make('bulletin.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bulletin = $this->bulletin->find($id); 
        
        return View::make('bulletin.edit', compact('bulletin'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bulletins = $this->bulletin->update($id);
		
		return View::make('bulletin.index', compact('bulletins'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$bulletins = $this->bulletin->delete($id); 

		return View::make('bulletin.index', compact('bulletins'));
	}

}
