<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest');
    }

    public function showRegistrationForm(): View
    {
      return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
      // Valider les champs de l'utilisateur
      $validated = $request->validate([
        'name' => ['required', 'string', 'between:5,64'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required','string', 'min:8', 'confirmed'],
      ]);

      $validated['password'] = Hash::make($validated['password']);

      // Créer un utilisateur dans la base de données
      $user = User::create($validated);

      // Authentifier un utilisateur
      Auth::login($user);

      // Redirection vers la page du compte de l'utilisateur avec une variable de session flash
      return redirect()->route('home')->withStatus('Votre compte a été créé avec succès !');
    }
}
