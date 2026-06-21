<!DOCTYPE html>
<html>
    <head>
        <title>Tasks</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto py-10 px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">New Task</h1>

            <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
                @csrf
                <label class="block mb-2 text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full border rounded-lg px-3 py-2 mb-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('title')
                    <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label class="flex items-center gap-2 mt-4 mb-6">
                    <input type="checkbox" name="done" value="1" class="rounded">
                    <span class="text-sm text-gray-700">Mark as done</span>
                </label>

                <div class="flex gap-2">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Create</button>
                    <a href="{{ route('tasks.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">Cancel</a>
                </div>
            </form>
        </div>
    </body>
</html>