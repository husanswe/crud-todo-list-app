<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function show() {
        return view('register-form');
    }

    public function register(Request $request) 
    {
        $validated = $request->validated();

        dd($validated);
    }
}
