<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' =>['required']
        ]);
        if (auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
        }
        return back()
            ->withInput()
            ->withErrors(['email', 'Your provided credentials could not be verified.']);
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
