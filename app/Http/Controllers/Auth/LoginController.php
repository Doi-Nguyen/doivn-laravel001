<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request)
    {

        if (Auth::user()->role == 'user') {
            return redirect('/frontend/home');
        }
        if (Auth::user()->role == 'admin') {
            $request->session()->flash('flash', 'Welcom Admin : ' . Auth::user()->name);
            return redirect('/admin/home');
        }

    }

    protected function validateLogin(Request $request)
    {
        $message = [
            'username.required' => 'name or email required',
            'username.max' => 'username not too long'
        ];

        $this->validate($request, [
            'username' => 'required|string|max:255',
            'password' => 'required|string',
        ],$message);
    }



    protected function credentials(Request $request)
    {
        $username = 'name';
        if (preg_match('/@/', $request->username)) {
            $username = 'email';
        }
        return [$username => $request->username, 'password' => $request->password];
    }


    public function username()
    {
        return 'username';
    }

}
