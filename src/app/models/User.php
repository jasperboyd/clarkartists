<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

use \Magniloquent\Magniloquent\Magniloquent;

class User extends Magniloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';
	protected $hidden = array('password');
	protected $guarded = array('id');
	protected $fillable = array('first_name', 'last_name', 'major', 'email', 'password'); 

	//TODO Validation Factory & Testing

	//Validation (with Magniloquent)

	/**
	 * Validation rules
	 */
	public $autoPurgeRedundantAttributes = true;

	public static $rules = array(
    
    	"save" => array(
    		'email' => 'required|email',
    		'password' => 'required|min:8'
  		),
  	
  		"create" => array(
    		'email' => 'unique:users'
  		),
  	
  		"update" => array(
  		)
	
	);

	protected static $relationships = array(
		'posts' => array('hasMany', 'Post'), 
		'comments' => array('hasMany', 'Comment'),
		'bulletins' => array('hasMany', 'Bulletin')
    );

	/**
    * Factory
    */
  	public static $factory = array(
   		   'username' => 'string',
  		   'email' => 'email',
 		   'password' => 'string',
	  );

  	/**
    * Feed
    */
  	public function feed()
    {
    	return $this->songs; 
    }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}