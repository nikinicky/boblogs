<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends Controller
{
  /**
   * undocumented function
   *
   * @return void
   */
  public function showLogin()
  {
    return view('blogs.index');
  }

  /**
   * undocumented function
   *
   * @return void
   */
  public function doLogin()
  {
    $rules = [
      'email' => 'user@example.com',
      'password' => 'qweasd'
    ],
    [
      'email' => 'require|email|unique:users',
      'password' => 'require|password|min:3'
    ];

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
      return Redirect::to('/login'->withInput(Input::except('password'))->withErrors($validator);
    } else
    {
      $userData = [
        'email' => Input::get('email'),
        'password' => Input::get('password')
      ];

      if (Auth::validate($userData))
      {
        if (Auth::attemp($userData))
        {
          return Redirect::intended('/');
        }
      } else
      {
        Session::flash('error', 'Something went wrong');
        return Redirect::to('/login');
      }
    }
  }
  
}
