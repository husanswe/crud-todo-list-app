@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="h3 mb-4">Add Category</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="card card-body shadow-sm">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection