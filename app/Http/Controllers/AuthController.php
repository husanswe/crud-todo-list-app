<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register_store(Request $request)
    {
        $validated = $request -> validate([

        ]);
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
