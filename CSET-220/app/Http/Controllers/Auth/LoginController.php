<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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

    /**
     * Handle user authentication and redirection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role_id == 21) {
            return redirect()->route('family.home');
        }
        else if ($user->role_id == 17)
            return redirect()->route('patient.home');
        else if ($user->role_id == 18)
            return redirect()->route('doctor.home');
        else if ($user->role_id == 20)
            return redirect()->route('caretaker.home');
        

        return redirect()->intended($this->redirectPath());
    }
}