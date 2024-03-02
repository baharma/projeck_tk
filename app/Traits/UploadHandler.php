<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait UploadHandler {
    
    public function uploadImage(UploadedFile $file, $folder)
    {
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filenameSimpan = time().'.'.$extension;

        $path = $file->storeAs( $folder , $filenameSimpan , 'images_local');

        return $path;

    }

}