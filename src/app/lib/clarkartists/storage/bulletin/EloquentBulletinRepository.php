<?php namespace clarkartists\storage\bulletin;

use Bulletin;

class EloquentBulletinRepository implements BulletinRepository {

  public function all()
  {
    return Bulletin::all();
  }

  public function find($id)
  {
    return Bulletin::find($id);
  }

  public function create($input)
  {
    $bulletin = new Bulletin($input);

    $user = \Auth::user(); 

    $bulletin->save(); 
    $user->bulletins()->save($bulletin);

    return $bulletin;
  }

  public function update($id)
  {
    $bulletin = $this->find($id);

    $bulletin->save(\Input::all());

    return $this->all();
  }

  public function delete($id)
  {
    Bulletin::destroy($id);

    return $this->all(); 
  }

}