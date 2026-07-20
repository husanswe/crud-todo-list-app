<x-layouts>
    <div class="bg-light">
        <div class="container py-5" style="max-width: 640px;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Import Tasks</h1>
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-sm">← Back</a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('tasks.import') }}" method="POST" class="card card-body shadow-sm">
                @csrf
                <label class="form-label">Paste tasks (one per line)</label>
                <textarea name="tasks" rows="10" class="form-control mb-3"
                        placeholder="Buy groceries&#10;Finish report&#10;Call the bank">{{ old('tasks') }}</textarea>
                <button class="btn btn-primary">Import</button>
            </form>
        </div>
    </div>
</x-layouts>