<?php

use \Magniloquent\Magniloquent\Magniloquent;

class Post extends Magniloquent {

	protected $table = 'posts';
	protected $guarded = array('id');
	protected $fillable = array('title', 'text', 'user_id', 'post_attachment', 'up_votes'); 

	//TODO Validation Factory & Testing

	//Validation (with Magniloquent)

	/**
	 * Validation rules
	 */
	public $autoPurgeRedundantAttributes = true;

	public static $rules = array(
    
    	"save" => array(
    		'title' => 'required',
    		'text' => 'required'
  		),
  	
  		"create" => array(
  		),
  	
  		"update" => array(
  		)
	
	);

	protected static $relationships = array(
		'user' => array('belongsTo', 'User'),
		'comments' => array('hasMany', 'Comment')
    );

	/**
    * Factory
    */
  	public static $factory = array();

  	public function scopePostsDesc($query)
    {
        return $query->where('title', '!=', '')->orderBy('created_at', 'desc')->get();
    }

}