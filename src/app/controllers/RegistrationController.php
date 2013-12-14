<?php
 
use clarartists\storage\user\UserRepository as User;
 
class RegistrationController extends BaseController {
 
  /**
   * User Repository
   */
  protected $user;
 
  /**
   * Inject the User Repository
   */
  public function __construct(User $user)
  {
    $this->user = $user;
  }
 
  public function index()
  {
    return View::make('registration.create');
  }
 
  public function store()
  {
    $s = $this->user->create(Input::all());
 
    if($s->isSaved())
    {
      return Redirect::route('users.edit', $s->id)
        ->with('flash', 'The new user has been created');
    }
 
    return Redirect::route('register.index')
      ->withInput()
      ->withErrors($s->errors());
  }
 
}
