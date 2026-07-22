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

    public function register(RegisterRequest $request) 
    {
        $validated = $request->validated();
    }
}
