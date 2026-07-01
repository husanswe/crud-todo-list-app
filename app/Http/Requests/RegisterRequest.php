<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // @return array<string, ValidationRule|array<mixed>|string>

    public function rules(): array
    {
        return [
            'name' => "required|string|min:3|max:50",
            'email'=> "required|email|unique:users,email",
            'age' => "required|integer|min:12|max:100",
            'password' => "required|string|min:8|confirmed",
            'website' => "nullable|url"
        ];
    }

    public function messages() 
    {   
        return [
            'name.required' => 'Please tell us your name.',
            'name.min' => 'Name is too short - at least 3 characters.',
            'email.email' => "That email doesn't look valid.",
            'email.unique' => "That email has been already registered. Try logging in instead.",
            'age.min' => 'You must be 12 or older to register',
            'password.confirmed' => "Passwords don't match. Try again!"
        ];
    }
}
