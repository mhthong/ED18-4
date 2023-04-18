<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     const ALL_GUARD = [
       'admin', 'web',/* 'shop', 'employee', 'user' */
     ];

    public function guard()
    {
        return Auth::guard('admin');
    }

    function login(Request $request)
    {

      $dataLogin = $request->only(['name', 'password']);

      foreach (self::ALL_GUARD as $guard) {
        if (Auth::guard($guard)->attempt($dataLogin)) {
          if($guard=='web')
          {
            return redirect('/home');
          }
          else{
            return redirect('/'.$guard.'/');
          }

        }
      }
      return redirect('/login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
