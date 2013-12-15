<?php namespace clarkartists\storage\post;

interface PostRepository {

  public function all();

  public function find($id);

  public function create($input);

  public function vote($id); 

  public function update($input);

  public function delete($id);
}
