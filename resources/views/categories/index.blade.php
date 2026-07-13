@extends('layouts.app')

    @section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Categories</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @can('manage-categories')
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
        @endcan

        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr> 
            </thead>

            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @can('manage-categories')
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No categories yet.</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>
    @endsection
