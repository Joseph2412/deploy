<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;  // Importa la tua classe LoginRequest
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Metodo per visualizzare il form di login
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    // Metodo per gestire il login
    public function login(LoginRequest $request)  
    {
        // Tentativo di login
        if (Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password
        ])) {
            // Se il login è riuscito
            return redirect()->intended('/'); // Reindirizza alla Home
        } else {
            // Se il login fallisce
            return back()->withErrors(['email' => __('ui.invalid_credentials')]);
        }
    }
}
