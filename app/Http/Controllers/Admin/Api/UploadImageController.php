<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

class UploadImageController extends Controller
{
    #[ArrayShape(['location' => "string"])]
    public function imageupload(Request $request): array
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('media/images'), $imageName);

        return [
            'location' => asset('media/images/' . $imageName)
        ];
    }
}