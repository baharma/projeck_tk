<?php 

namespace App\Repositories;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\UploadedFile;

interface GalleryRepository {
    public function list(array $params);

    public function storeGallery(array $data);
    public function updateGallery( Gallery $gallery , array $data);
}