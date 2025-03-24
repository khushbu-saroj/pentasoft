<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            $currentSessionId = Session::getId();

            if ($user->current_session_id && $user->current_session_id !== $currentSessionId) {
                session(['new_session_id' => $currentSessionId]);

                Auth::logout();
                return redirect()->route('session.choice');
            }
            $user->update(['current_session_id' => $currentSessionId]);

            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    
}
