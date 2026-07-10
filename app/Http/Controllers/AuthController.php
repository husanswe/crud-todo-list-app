<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email'=> 'email|required|unique:users',
            'passowrd'=>'required|string|min:8'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        Auth::login($user);

        return redirect()->route('tasks.index');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login()
    {
        // 
    }

    public function logout()
    {
        // 
    }
}
