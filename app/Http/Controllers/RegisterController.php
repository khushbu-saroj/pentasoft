<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registerSubmit(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);
    
        return redirect()->route('login')->with('success', 'Registration successful!');
    }
}
