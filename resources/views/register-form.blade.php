<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Register Form</title>

        <style>
            form {
                max-width: 400px;
                display: flex;
                flex-direction: column;
                gap: 5px;
                padding: 20px;
            }
            input, button {
                padding: 8px;
            }
            .error {
                color: red;
                margin: 0;
            }

            button {
                background: rgb(53, 194, 53);
            }

            .container {
                display: grid; 
                place-items: center;
            }
        </style>
    </head>

    <body>
        <h1>Validation Lesson Tasks — 5 tasks. Task 1 — Form with 5 validation rules</h1>

        <div class="container">
            <form action="/register-form" method="POST">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name') 
                    <p style="color:red">{{ $message }}</p>
                @enderror

                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}">
                


                <button type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>
