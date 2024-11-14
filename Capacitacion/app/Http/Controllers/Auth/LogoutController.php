<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ActiveSession;

class LogoutController extends Controller
{
    public function logout()
    {
        $activeSession = ActiveSession::where('user_id', Auth::id())->first();

        if ($activeSession) {
            $activeSession->delete();
        }

        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();

        return redirect('/login');
    }
}

