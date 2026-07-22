<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function show() {
        return view('register-form');
    }

    public function register(Request $request) 
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($request->password),
        ]);

        Mail::to($request->user())->send(new WelcomeMail($user));

        auth()->login($user);

        return redirect()->route('tasks.index')->with('success', 'Welcome! Your account is ready.');
    }
}
