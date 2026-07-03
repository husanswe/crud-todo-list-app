<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>File Listing task 3</title>

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

                <button>
                    <a href="/files/download" class="download-link">Download</a>
                </button>
            </div>

            <form action="/files/{{ basename($file) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="delete-btn">Delete</button>
            </form>
        @endforeach
    </body>
</html>