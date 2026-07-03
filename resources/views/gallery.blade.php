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
                <p style="color: red">{{ $message }}</p>
            @enderror
            <button>Upload</button>
        </form>

        <div style="display: grid;
                    grid-template-columns: repeat(3, 1fr); 
                    gap: 10px; margin-top: 20px;">
            @foreach ($images as $image)
                <img src="{{ asset('storage/' . $image->$path) }}" style="width: 100%;" alt="image uploaded by user">
            @endforeach
        </div>
    </body>
</html>