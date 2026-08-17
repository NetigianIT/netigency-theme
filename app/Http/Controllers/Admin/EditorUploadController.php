<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EditorUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,jpg,png,gif,webp,svg,mp4,webm,mp3,mpeg|max:10240',
        ]);

        $file = $request->file('file');
        $folder = public_path('uploads/img/editor');

        if (!File::isDirectory($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $safeName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $name = time() . '-' . ($safeName !== '' ? $safeName : 'file') . '.' . $file->getClientOriginalExtension();

        $file->move($folder, $name);

        return response()->json([
            'location' => asset('uploads/img/editor/' . $name),
        ]);
    }
}
