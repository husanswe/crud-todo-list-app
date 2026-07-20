<!DOCTYPE html>
<html>
<head>
    <title>TO-DO List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto py-10 px-4">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">My Tasks</h1>
            <a href="{{ route('tasks.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                + New Task
            </a>
            <a href="{{ route('tasks.import.show') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
                Import
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @auth
            <nav class="navbar navbar-dark bg-dark px-4 mb-3 rounded">
                <span class="navbar-brand">
                    {{ auth()->user()->name }}
                </span>

                <div class="d-flex align-items-center gap-2">
                    @if (auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="text-warning border border-warning rounded p-1.5">Admin Panel</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-md">Logout</button>
                    </form>
                </div>
            </nav>
        @endauth
        

        <div class="bg-white rounded-lg shadow divide-y">
            @forelse($tasks as $task)
                <div class="flex items-center justify-between p-4" data-task-id="{{ $task->id }}">
                    <div class="flex items-center gap-3">
                        <span class="task-done-indicator w-3 h-3 rounded-full {{ $task->done ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                        <span class="task-title {{ $task->done ? 'line-through text-gray-400' : 'text-gray-800' }}">
                            {{ $task->title }}
                        </span>
                    </div>

                    @foreach($task->tags as $tag)
                        <span style="background:#3b82f6; color:white; ...">
                            {{ $tag->name }}
                        </span>
                    @endforeach

                    <div class="flex gap-2">
                        @can('update', $task)
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        @endcan

                        @can('delete', $task)
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500">No tasks yet. Add one!</div>
            @endforelse
        </div>

    </div>

    <script>
        window.userId = {{ auth()->id() }};
    </script>

    <script type="module">

        window.Echo.private(`user.${window.userId}`)
        .listen('.task.updated', (e) => {
            console.log('Task updated:', e);

            const row = document.querySelector(`[data-task-id="${e.id}"]`);
            if (!row) return;

            // Update the dot color
            const dot = row.querySelector('.task-done-indicator');
            if (dot) {
                dot.classList.toggle('bg-green-500', e.done);
                dot.classList.toggle('bg-gray-300', !e.done);
            }

            // Update the title text + strikethrough
            const titleEl = row.querySelector('.task-title');
            if (titleEl) {
                titleEl.textContent = e.title;
                titleEl.classList.toggle('line-through', e.done);
                titleEl.classList.toggle('text-gray-400', e.done);
                titleEl.classList.toggle('text-gray-800', !e.done);
            }
        });
    </script>
</body>
</html>