<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Exibe a página de login.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Processa a tentativa de login.
     */
    public function login(Request $request)
    {
        // Validação das credenciais fornecidas no formulário de login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'],
            ['email.required' => 'O campo Email é obrigatório',
            'password.required' => 'O campo Password é obrigatório' ]);
        // Tentativa de autenticação do usuário com as credenciais fornecidas
        if (Auth::attempt($credentials)){
            // Regenera a sessão após o login bem-sucedido
            $request->session()->regenerate();
            // Redireciona para a página inicial apropriada com base no tipo de utilizador
            if(auth()->user()->getTypeUser() == 'driver')
                return redirect()->intended(route('driver.home.index'));

            return redirect()->intended(route('home'));
        }
        // Redireciona de volta com mensagens de erro em caso de falha de autenticação
        return back()->withErrors([
            'email' => 'Verifique as suas credenciais'
        ])->onlyInput('email');
    }

    /**
     * Realiza o logout do usuário.
     */
    public function logout(Request $request){
        // Realiza o logout do utilizador
        Auth::logout();
        // Invalida a sessão e regenera o token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redireciona para a página de login
        return to_route('login');
    }
}
