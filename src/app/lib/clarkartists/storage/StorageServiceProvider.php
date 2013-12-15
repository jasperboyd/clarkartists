<?php namespace clarkartists\storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind(
      'clarkartists\storage\user\UserRepository',
      'clarkartists\storage\user\EloquentUserRepository'
    );

    $this->app->bind(
      'clarkartists\storage\post\PostRepository',
      'clarkartists\storage\post\EloquentPostRepository'
    ); 
 

$this->app->bind(
	'clarkartists\storage\comments\CommentsRepository', 
	'clarkartists\storage\comments\EloquentCommentsRepository'
); 

  }

}
