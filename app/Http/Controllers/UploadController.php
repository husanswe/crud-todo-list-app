<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
