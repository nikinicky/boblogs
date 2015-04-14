<?php namespace App\Http\Controllers;

  use App\Http\Requests;
  use App\Http\Controllers\Controller;

  use Illuminate\Http\Request;

  /**
   * 
   */
  class PagesController extends Controller
  {
    
    /**
     * 
     */
    public function getIndex()
    {
      return view('blogs.index');
    }

    public function getAbout()
    {
      return view('blogs.about');
    }

    // /**
    //  * login form 
    //  *
    //  * @return view
    //  */
    // public function userAuth()
    // {
    //   return view('blogs.login');
    // }
    //
  }

?>
