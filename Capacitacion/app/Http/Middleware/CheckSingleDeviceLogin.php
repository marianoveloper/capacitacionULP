<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ActiveSession;

class CheckSingleDeviceLogin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();//Obtener el usuario autenticado
            $currentSessionId = Session::getId();//Obtener el id de la sesion actual

            $activeSession = ActiveSession::where('user_id', $user->id)->first();//Buscar la sesion activa del usuario

            if ($activeSession) {
                if ($activeSession->session_id !== $currentSessionId) {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Tu sesión ha sido cerrada porque iniciaste sesión en otro dispositivo.');
                }
            } else {
                ActiveSession::create([
                    'user_id' => $user->id,
                    'session_id' => $currentSessionId,
                ]);
            }
        }

        return $next($request);
    }
}

