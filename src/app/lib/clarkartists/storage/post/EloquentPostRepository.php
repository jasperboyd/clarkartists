<?php namespace clarkartists\storage\post;

use Post;

class EloquentPostRepository implements PostRepository {

  public function all()
  {
    return Post::all();
  }

  public function find($id)
  {
    return Post::find($id);
  }

  public function create($input)
  {
    $post = new Post($input);

    $user = \Auth::user(); 

    $post->save(); 

    $user->posts()->save($post);
    
    return $post;
  }

  public function vote($id)
  { 
    $post = $this->find($id); 
    $post->up_votes = $post->up_votes + 1; 
    return $post->save(); 
  }

  public function update($id)
  {
    $post = $this->find($id);

    $post->save(\Input::all());

    return $post;
  }

  public function delete($id)
  {
    return Post::destroy($id);
  }

}