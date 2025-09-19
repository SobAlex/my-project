<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminImageUploadController extends Controller
{
    /**
     * Handle image upload for TinyMCE file picker
     * Returns JSON response as per TinyMCE documentation
     */
    public function uploadImage(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate unique filename
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // Store file in storage/app/public/images
            $path = $file->storeAs('images', $filename, 'public');

            // Get the public URL
            $url = Storage::url($path);

            // Return JSON response as per TinyMCE documentation
            return response()->json([
                'location' => $url
            ]);
        }

        // Return error response
        return response()->json([
            'error' => 'No file uploaded'
        ], 400);
    }
}
