<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if (!$request->hasFile('foto')) {
            return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
        }

        $file = $request->file('foto');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('image'), $filename);

        return response()->json([
            'success' => true,
            'path' => 'image/' . $filename,
            'url' => asset('image/' . $filename) 
        ]);
    }
}