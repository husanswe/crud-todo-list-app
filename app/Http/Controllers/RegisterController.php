<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show() {
        return view('register-form');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => "required|string|max:50",
            'email'=> "required|email|unique:users,email",
            'age' => "required|integer|min:12",
            'password' => "required|string|min:8|confirmed",
            'website' => "nullable|url"
        ]);

        dd($validated);
    }
}
