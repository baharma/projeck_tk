<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait UploadHandler {
    
    public function uploadImage(UploadedFile $file, $folder)
    {
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.time().'.'.$extension;

        $path = $file->storeAs( $folder , $filenameSimpan , 'local');

        return $path;

    }

}