<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validazione dei dati del form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Regola di conferma password
        ], [
            'password.confirmed' => __('ui.confirmed'),
        ]);

        // Se la validazione fallisce
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator); // Torna indietro con gli errori
        }

        // Creazione dell'utente
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Cripta la password
        ]);

        // Risposta di successo
        session()->flash('message', __('ui.registration_success'));
        return redirect()->route('login');
    }
}
