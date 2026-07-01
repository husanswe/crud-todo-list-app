<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Register Form</title>

        <style>
            * {
                box-sizing: border-box;
            }

            form {
                width: 100%;
                max-width: 500px;
                display: flex;
                flex-direction: column;
                gap: 5px;
                padding: 20px;
            }
            input, button {
                width: 100%;
                padding: 8px;
                border-radius: 10px;
            }
            .error {
                color: red;
                margin: 0;
            }

            button {
                background: rgb(53, 194, 53);
                margin-top: 15px;
                cursor: pointer;
                border: none;
                color: white;
                font-weight: bold;
                padding-block: 15px;
            }

            .container {
                display: grid; 
                place-items: center;
                padding: 0 16px;
            }
        </style>
    </head>

    <body>
        <h1>Validation Lesson Tasks — 5 tasks. Task 1 — Form with 5 validation rules</h1>

        <div class="container">
            <form action="/register-form" method="POST" autocomplete="off">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name') 
                    <p style="color:red;">{{ $message }}</p>
                @enderror

                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}">
                @error('email')
                    <p style="color: red;">{{ $message }}</p>                    
                @enderror

                <label for="age">Age</label>
                <input type="number" name="age" value="{{ old('age') }}">
                @error('age')
                    <p style="color: red;">{{ $message }}</p>                    
                @enderror

                <label for="password">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" autocomplete="new-password">
                @error('password')
                    <p style="color: red;">{{ $message }}</p>                    
                @enderror

                <label for="password_confirmation">Confirm Your Password</label>
                <input type="password" name="password_confirmation" value="{{ old('password') }}">
                @error('password_confirmation')
                    <p style="color: red;">{{ $message }}</p>                    
                @enderror

                <label for="role">Role</label>
                <select name="role">
                    <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                    <option value="editor" @selected(old('role') === 'editor')>Editor</option>
                    <option value="user" @selected(old('role') === 'user')>User</option>
                </select>
                @error('role') 
                    <p class="error">{{ $message }}</p>
                @enderror

                <label for="phone">Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
                @error('phone') 
                    <p class="error">{{ $message }}</p>
                @enderror

                <label for="bio">Bio</label>
                <textarea name="bio" cols="30" rows="10">{{ old('bio') }}</textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>
