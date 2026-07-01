<h1>Task 1 — Upload, store & display an image</h1>

<div style="display: flex">
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Upload an image</label>
        <input type="file" name="image">
        @error('image')
            <p style="color: red"> {{ $message }} </p>
        @enderror
    
        <button type="submit">Submit</button>
    </form>

    @if(session('path'))
        <img src="{{ asset('storage/' . session('path')) }}" width="500" alt="image">
    @endif
</div>