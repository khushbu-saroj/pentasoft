<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class SessionController extends Controller
{
    public function showChoice()
    {
        return view('auth.session-choice');
    }

    public function handleChoice(Request $request)
    {
        $choice = $request->input('choice');
        $user = User::where('email', session('email'))->first();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        if ($choice === 'new') {
            Session::getHandler()->destroy($user->current_session_id);

            $user->update(['current_session_id' => session('new_session_id')]);

            Auth::login($user);
        } else {
            session()->flush();
            return redirect()->route('login')->withErrors(['error' => 'Old session retained. New session discarded.']);
        }

        return redirect()->intended('dashboard');
    }
}
