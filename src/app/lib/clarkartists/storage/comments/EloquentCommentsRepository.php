<?php namespace clarkartists\storage\comments;

use Comment;

class EloquentCommentsRepository implements CommentsRepository {

  public function all()
  {
    return Comment::all();
  }

  public function find($id)
  {
    return Comment::find($id);
  }

  public function create($input, $post)
  {
    $comment = new Comment($input);

    $user = \Auth::user(); 

    $comment->save(); 
    $user->comments()->save($comment);
    $post->comments()->save($comment); 
    
    return $comment;
  }

  public function update($id)
  {
    $comment = $this->find($id);

    $comment->save(\Input::all());

    return $comment;
  }

  public function delete($id)
  {
    return Comment::destroy($id);
  }

}