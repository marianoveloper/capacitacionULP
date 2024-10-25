<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
   // Redirige al usuario a Google para la autenticación
   public function redirectToGoogle()
   {
       return Socialite::driver('google')->redirect();
   }

   // Maneja la respuesta de Google
   public function handleGoogleCallback()
   {
       try {
           // Obtener el usuario de Google
           $googleUser = Socialite::driver('google')->stateless()->user();

           // Buscar si ya existe un usuario con este email
           $user = User::where('email', $googleUser->getEmail())->first();

           if ($user) {
               // Si el usuario ya existe, lo autenticamos
               Auth::login($user);
           } else {
               // Si no existe, creamos un nuevo usuario
               $user = User::create([
                   'name' => $googleUser->getName(),
                   'email' => $googleUser->getEmail(),
                   'google_id' => $googleUser->getId(),
                   'password' => bcrypt('password'), // Puedes cambiar esto si es necesario
               ]);

               Auth::login($user);
           }

           // Redirigir a la página principal después del login
           return redirect('/home');

       } catch (\Exception $e) {
           return redirect('/login')->withErrors('Error al autenticar con Google');
       }
   }
}
