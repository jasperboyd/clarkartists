<?php namespace clarkartists\storage\comments;

interface CommentsRepository {

  public function all();

  public function find($id);

  public function create($input, $post);

  public function createBulletinComment($input, $bulletin);

  public function update($input);

  public function delete($id);
}
