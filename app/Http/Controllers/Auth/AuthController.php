<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\User;

// use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller {

  /*
	 * The model instance.
	 *
	 * @var User
	 */
	protected $user;

	/**
	 * The Guard implementation.
	 *
	 * @var Authenticator.
	 */
	protected $auth;

  /**
   * Create a new authentication controller instance. 
   *
   * @param Authenticator $auth
   * @return void
   */
  public function __construct(Guard $auth, User $user)
  {
    $this->user = $user;
    $this->auth = $auth;

    $this->middleware('guest', ['except' => ['getLogout']]);
  }


	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param RegisterRequest $request 
	 * @return Response 
	 */
	public function postRegister(RegisterRequest $request)
	{
    $this->user->name = $request->name;
    $this->user->email = $request->email;
    $this->user->password = bcrypt($request->password);
    $this->user->save();

    $this->auth->login($this->user);
    return redirect('/');
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param LoginRequest $request
   * @return Response
	 */
	public function postLogin(LoginRequest $request)
	{
    if ($this->auth->attempt($request->only('email', 'password')))
    {
      return redirect('/');
    }

    return redirect('/auth/login')->withErrors([
      'email' => 'The credentials you entered did not match our records. Try again?'
    ]);
	}

	/**
	 * Get the failed login message.
	 *
	 * @return string
	 */
	protected function getFailedLoginMesssage()
	{
		return 'These credentials do not match our records.';
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
	}

	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
	}
}
