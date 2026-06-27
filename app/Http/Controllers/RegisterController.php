<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(Request $request) {
        $validated = $request->validate([
            'name' => "required|string|min:3|max:50",
            'email'=> "required|email|unique:users,email",
            'age' => "required|integer|min:18|max:99",
            'password' => "required|string|min:8|confirmed",
            'website' => "nullable|url"
        ]);
    }

    public function register() {

    }
}
