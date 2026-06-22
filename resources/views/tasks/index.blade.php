<!DOCTYPE html>
<html>
    <head>
        <title>TO-DO List App</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto py-10 px-4">
            
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">My Tasks</h1>
                <a href="{{ route('tasks.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                    + New Task
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow divide-y">
                @forelse($tasks as $task)
                    <div class="flex items-center justify-between p-4">
                        <div class="flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full {{ $task->done ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                            <span class="{{ $task->done ? 'line-through text-gray-400' : 'text-gray-800' }}">
                                {{ $task->title }}
                            </span>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                            class="text-blue-600 hover:underline text-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline text-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-500">No tasks yet. Add one!</div>
                @endforelse
            </div>

        </div>
    </body>
</html>