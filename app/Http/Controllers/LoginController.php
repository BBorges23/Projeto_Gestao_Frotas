<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'],
            ['email.required' => 'O campo Email é obrigatório',
            'password.required' => 'O campo Password é obrigatório' ]);
        //dd($credentials);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }
        return back()->withErrors([
            'email' => 'Verifique as suas credenciais'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login');
    }
}
