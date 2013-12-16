<?php

use \Magniloquent\Magniloquent\Magniloquent;

class Bulletin extends Magniloquent {

	protected $table = 'bulletins';
	protected $guarded = array('id');
	protected $fillable = array('title', 'text', 'user_id'); 

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

  	public function scopeBulletinsDesc($query)
    {
        return $query->where('title', '!=', '')->orderBy('created_at', 'desc')->get();
    }

}