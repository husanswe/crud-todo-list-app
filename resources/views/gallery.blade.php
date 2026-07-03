<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <h1>Task 2 — Multiple file upload + list them</h1>

        <form action="/gallery" method="POST">
            @csrf
            <input type="file" name="images[]" multiple>
            @error('images')
                <p style="color: red">{{ $message }}</p>
            @enderror
            @error('images.*')
                
            @enderror
        </form>
    </body>
</html>