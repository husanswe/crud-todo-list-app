<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Working w/ Files</title>

        <style>
            .success {
                color: green;
            }
            .file-row {
                display: flex;
                gap: 10px;
                align-items: center;
                margin-bottom: 8px;
            }
            .file-name {
                min-width: 200px;
            }
            .download-link {
                color: blue;
                text-decoration: none;
            }
            .delete-btn {
                cursor: pointer;
                color: red;
            }

            .download-btn {
                display: inline-block;
                padding: 6px 16px;
                background: rgb(53, 194, 53);
                color: white;
                text-decoration: none;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <h1 style="text-align: center">Task 3 — Download & delete files</h1>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @foreach ($files as $file)
            <div class="file-row">
                <span class="file-name">{{ basename($file) }}</span>

                <a href="/files/download/{{ basename($file) }}" class="download-btn">Download</a>
            </div>

            <form action="/files/{{ basename($file) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="delete-btn">Delete</button>
            </form>
        @endforeach
    </body>
</html>