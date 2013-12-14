<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

use \Magniloquent\Magniloquent\Magniloquent;

class User extends Magniloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';
	protected $hidden = array('password', 'has_soundcloud', 'has_vimeo', 'has_500px');
	protected $guarded = array('id');
	protected $fillable = array('first_name', 'last_name', 'email'); 

	//TODO Validation Factory & Testing

	//Validation (with Magniloquent)

	/**
	 * Validation rules
	 */
	public $autoPurgeRedundantAttributes = true;

	public static $rules = array(
    
    	"save" => array(
    		'username' => 'required|min:4',
    		'email' => 'required|email',
    		'password' => 'required|min:8'
  		),
  	
  		"create" => array(
    		'username' => 'unique:users',
    		'email' => 'unique:users'
  		),
  	
  		"update" => array(
  		)
	
	);

	protected static $relationships = array(

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