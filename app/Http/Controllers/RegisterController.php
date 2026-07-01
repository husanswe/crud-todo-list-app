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
            'name' => "required|string|min:3|max:50",
            'email'=> "required|email|unique:users,email",
            'age' => "required|integer|min:12",
            'password' => "required|string|min:8|confirmed",
            'website' => "nullable|url"
        ], 
        [
            'name.required' => 'Please tell us your name.',
            'name.main' => 'Name is too short - at least 3 characters.',
            'email.email' => "That email doesn't look valid.",
            'email.unique' => "That email has been already registered. Try logging in instead.",
            'age.min' => 'You must be 12 or older to register',
            'password.confirmed' => "Passwords don't match. Try again!"
        ]);

        dd($validated);
    }
}
