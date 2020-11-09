<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check() === true){
            return redirect()->route('index');
        }
        return redirect()->route('index');
    }

    public function showLoginForm()
    {
        if (Auth::check() === true) {
            return redirect()->back()->withInput()->withErrors(['Você já está em uma sessão!']);
        }
        return view('usuario.pLogin');
    }

    public function login(Request $request)
    {
        var_dump($request->all());

        $credenciais = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciais)) {
            return redirect()->route('usuario');
        }

        return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('usuario');
    }
}
