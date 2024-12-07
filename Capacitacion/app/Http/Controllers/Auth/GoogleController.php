<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ActiveSession;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
     {
         return Socialite::driver('google')->redirect();//Redirigir al usuario a la pagina de inicio de sesion de Google
    }

    public function handleGoogleCallback() {
        try {
                $user = Socialite::driver('google')->user();//Obtener los datos del usuario
                $finduser = User::where('google_id', $user->id)->first();//Buscar el usuario

                     if ($finduser)
                      {
                            Auth::login($finduser);//Iniciar sesion con el usuario
                            $this->manageActiveSession($finduser);//Crear una nueva sesion activa
                        }
                        else {
                                $newUser = User::create([
                                'name' => $user->name,
                                'email' => $user->email,
                                'google_id' => $user->id,
                                'password' => bcrypt('password'), ]);

                                    Auth::login($newUser); //Iniciar sesion con el nuevo usuario
                                    $this->manageActiveSession($newUser);//Crear un nuevo usuario

                             } return redirect()->intended('dashboard');//Redirigir al usuario a la pagina de inicio
            } catch (\Exception $e)
                {
                    return redirect()->route('login')->with('error', 'Google login failed');//Si falla el inicio de sesion con Google
                }
            }


            private function manageActiveSession($user)
             {
dd("llego");
                $currentSessionId = Session::getId();//Obtener el id de la sesion actual
                $activeSession = ActiveSession::where('user_id', $user->id)->first();//Buscar la sesion activa del usuario
                dd($activeSession);
                 if ($activeSession)
                  {
                    dd($activeSession);
                         $activeSession->delete();//Eliminar la sesion activa
                        $activeSession->session_id = $currentSessionId;//Actualizar el id de la sesion
                         $activeSession->save();//Actualizar la sesion activa

                    } else {

                                ActiveSession::create([
                                                        'user_id' => $user->id,
                                                          'session_id' => $currentSessionId, ]);//Crear una nueva sesion activa
                             }
             }
}
