<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function __construct()
    {

    }

    public function ckeditorUploadImage(Request $request){
        if ($request->hasFile('upload')) {
            $filename = uploadImageHelper($request->file('upload'),'CkEditor');
            return response()->json(['fileName' => $filename, 'uploaded'=> 1, 'url' => asset($filename)]);
        }
    }
}
