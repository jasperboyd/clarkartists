<?php namespace clarkartists\storage\user;

interface UserRepository {

  public function all();

  public function find($id);

  public function create($input);

  public function update($input);

  public function delete($id);

  public function feed();
}
