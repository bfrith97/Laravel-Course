<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index() {
        return view('sessions.create');
    }

    public function login() {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (! auth()->attempt($attributes)) {
            return back()->withErrors([
                'email' => 'Your provided credentials could not be verified.',
                'password' => 'Your password was incorrect'    
            ]);
        }
        
        session()->regenerate();
        return redirect('/')->with('success', 'Welcome back!');
       
    }

    public function logout() {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out');
    }
}
