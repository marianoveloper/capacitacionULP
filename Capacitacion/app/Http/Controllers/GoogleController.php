<?php


namespace App\Http\Controllers;

use Exception;
; use App\Http\Controllers\Controller; use App\Models\User; use Illuminate\Support\Facades\Auth; use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle(){
        try {

       //     dd(Socialite::driver('google') );

        return Socialite::driver('google')->redirect();

        } catch (Exception $e) {
            logger()->error('Error en redirección Google:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('login')->with('error', 'Error al conectar con Google. Por favor, inténtalo de nuevo.');
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try { $user = Socialite::driver('google')->user();
             $finduser = User::where('google_id', $user->id)->first();
              if ($finduser) {
                Auth::login($finduser);
            } else { $newUser = User::create([ 'name' => $user->name, 'email' => $user->email, 'google_id' => $user->id, 'password' => bcrypt('password'), ]);
                 Auth::login($newUser);
                 }
                 return redirect()->intended('dashboard');
                } catch (\Exception $e) {
                    return redirect()->route('login')->with('error', 'Google login failed'); }
    }

}
