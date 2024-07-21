<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login() {
        return view('session.login-session');
    }

    public function loginAction(Request $request) {
        if(!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        if($request->input('remember') == 'on') {
            setcookie('email', $request->input('email'), time()+3600);
            setcookie('password', $request->input('password'), time()+3600);
        }else {
            setcookie('email', '');
            setcookie('password', '');
        }

        $request->session()->regenerate();
        
        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
