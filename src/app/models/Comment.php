<?php

use \Magniloquent\Magniloquent\Magniloquent;

class Comment extends Magniloquent {

	protected $table = 'comments';
	protected $guarded = array('id');
	protected $fillable = array('comment', 'user_id', 'post_id'); 

	//TODO Validation Factory & Testing

	//Validation (with Magniloquent)

	/**
	 * Validation rules
	 */
	public $autoPurgeRedundantAttributes = true;

	public static $rules = array(
    
    	"save" => array(
    		'comment' => 'required'
  		),
  	
  		"create" => array(
  		),
  	
  		"update" => array(
  		)
	
	);

	protected static $relationships = array(
		'user' => ['belongsTo', 'User'],
		'post' => ['belongsTo', 'Post'], 
		'bulletin' => ['belongsTo', 'Bulletin']
    );

	/**
    * Factory
    */
  	public static $factory = array();

}