<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ActiveSession;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSingleDeviceLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario esta conectado a otro dispositivo
        dd("llego al middleware");
        if(Auth::check())
        {
            $user=Auth::user();//Obtener el usuario autenticado
            $current_session_id = session()->getId();//Obtener el id de la sesion actual
            $active_session= ActiveSession::where('user_id',$user->id)->first();//Buscar la sesion activa del usuario

            if($active_session)
            {
                if($active_session->session_id != $current_session_id)//Si la sesion activa no es la misma que la actual
                {
                    Auth::logout();
                    $active_session->delete();
                    return redirect()->route('login')->with('error','Ya hay una sesión activa en otro dispositivo');//Cerrar la sesion y redirigir al usuario a la pagina de inicio de sesion
                }
                else
                {
                    ActiveSession::create([
                        'user_id'=>$user->id,
                        'session_id'=>$current_session_id
                    ]);//Actualizar la sesion activa

                }
            }



        } // Close class CheckSingleDeviceLogin

        return $next($request);
    }
}
