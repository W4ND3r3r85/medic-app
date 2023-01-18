<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required', 'min:4', 'max:255', Rule::unique('users','username')],
            'name' => ['required', 'min:6', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'phone' => ['required', 'max:10', Rule::unique('users', 'phone')],
            'password' => ['required', 'min:8', 'max:255'],
        ]);
        $user = User::create($attributes);
        auth()->login($user);
        return redirect('/')->with('success', 'Your account has been created.');
    }

    public function update()
    {
    $attributes = request()->validate([
        'name' => ['required', 'min:6', 'max:255'],
        'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore(auth()->user()->id)],
        'phone' => ['required', 'max:10', Rule::unique('users', 'phone')->ignore(auth()->user()->id)],
        'password' => ['min:8', 'max:255'],
    ]);
    $attributes['password'] = bcrypt($attributes['password']);
    $user = DB::table('users')->where('id','=', auth()->user()->id)->update($attributes);
    return redirect('/dashboard')->with('success','Your data has been updated.');
    }
}
