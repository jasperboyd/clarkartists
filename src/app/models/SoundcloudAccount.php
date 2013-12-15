<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

use \Magniloquent\Magniloquent\Magniloquent;

class User extends Magniloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';
	protected $guarded = array('id', 'user_id');
	protected $fillable = array('client_id', 'client_secret');
	p 

	//TODO Validation Factory & Testing

	//Validation (with Magniloquent)

	/**
	 * Validation rules
	 */
	public $autoPurgeRedundantAttributes = true;

	public static $rules = array(
    
    	"save" => array(
    		'client_id' => 'required', 
    		'client_secret' => 'required'
  		),
  	
  		"create" => array(),
  		"update" => array()
	
	);

	protected static $relationships = array(
		'user' => ['belongsTo', 'User'],
    );

	/**
    * Factory
    */
  	public static $factory = array();


	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
}