<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
//use App\Models\Users;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Socialite;


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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public $email = "demo";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    public function login1(Request $request)
    {
        
        if(Auth::guard('user')->attempt($request->only(['email', 'password'])))
        {
            return redirect()->intended('/');
        }

        $errors = array(
            'email' => 'Email falsch oder passwort',
            'password' => 'Password falsch'
        );

        return redirect()->back()->withErrors($errors);
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }

    public function index1()
    {
        return view('auth.login');
    }
}
