<?php


namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\ActiveSession;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


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
        try {
             $user = Socialite::driver('google')->user();// Get the user from Google
             $finduser = User::where('google_id', $user->id)->first();// Check if the user exists
              if ($finduser) {
                Auth::login($finduser);// Login the user
            } else {
                      $newUser = User::create([ 'name' => $user->name, 'email' => $user->email, 'google_id' => $user->id, 'password' => bcrypt('password'), ]);// Create a new user
                      Auth::login($newUser);
                 }
                 return redirect()->intended('dashboard');
                } catch (\Exception $e) {
                    return redirect()->route('login')->with('error', 'Google login failed'); }// Redirect to the login page with an error message
    }

    private function manageActiveSession($user)
    {
        $currentSessionId = Session::getId(); $activeSession = ActiveSession::where('user_id', $user->id)->first(); // Find the active session of the user
            if ($activeSession)
            {
                $activeSession->session_id = $currentSessionId; $activeSession->save();
            } else { ActiveSession::create([ 'user_id' => $user->id, 'session_id' => $currentSessionId, ]); }// Create the active session
     }

}
