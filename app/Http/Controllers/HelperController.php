<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function __construct()
    {

    }

    public function ckeditorUploadImage(Request $request){
        try {
        if ($request->hasFile('upload')) {
            $filename = uploadImageHelper($request->file('upload'),'CkEditor');
            return response()->json(['fileName' => $filename, 'uploaded'=> 1, 'url' => asset($filename)]);
        }

    } catch (\Exception $e) {
        // Log or handle the exception
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }
}
