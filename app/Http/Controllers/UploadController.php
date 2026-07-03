<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadedImage;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function show()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate ([
            'image'=> 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $path = $request->file('image')->store('uploads', 'public');

        return back()->with('path', $path);
    } 

    public function gallery() 
    {   
        $images = UploadedImage::latest()->get();
        return view('gallery', ['images' => $images]);
    }

    public function storeMultiple(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        foreach ($request->file('images') as $file) 
        {
            $path = $file->store('uploads', 'public');
            UploadedImage::create(['path' => $path]);
        }

        return redirect('/gallery');
    }

    public function listFiles()
    {
        $files = Storage::disk('public')->files('uploads');
        return view('files', ['files' => $files]);
    }

    public function download($filename)
    {
        $path = 'uploads/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            return back()->with('error', 'File not found');
        }

        return Storage::disk('public')->download($path);
    }

    public function delete($filename)
    {
        $path = 'uploads/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            return back()->with('error', 'File not found');
        }

        Storage::disk('public')->delete($path);
        return back()->with('success', 'File deleted!');
    }
}
