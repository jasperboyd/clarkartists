<?php namespace clarkartists\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind(
      'Musitect\Storage\User\UserRepository',
      'Musitect\Storage\User\EloquentUserRepository'
    );
    $this->app->bind(
    	"Musitect\Storage\Song\SongRepository", 
    	"Musitect\Storage\Song\EloquentSongRepository"
    );
    $this->app->bind(
      "Musitect\Storage\Phrase\PhraseRepository", 
      "Musitect\Storage\Phrase\EloquentPhraseRepository"
    ); 
    $this->app->bind(
      "Musitect\Storage\Collective\CollectiveRepository", 
      "Musitect\Storage\Collective\EloquentCollectiveRepository"
    ); 
    $this->app->bind(
      "Musitect\Storage\CollectivePass\CollectivePassRepository", 
      "Musitect\Storage\CollectivePass\EloquentCollectivePassRepository"
    ); 
  }

}
