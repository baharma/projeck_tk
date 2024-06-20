<?php

namespace App\Repositories\Eloquent;

use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use App\Traits\UploadHandler;
use Illuminate\Http\UploadedFile;

class EloquentGalleryRepository extends EloquentBaseRepository implements GalleryRepository
{
    use UploadHandler;

    public function list(array $params)
    {
        
        $categories = $this->model

        ->when(isset($params['search']) , function($q) use ($params) {
            $q->where('name' , 'like' , '%'.$params['search'].'%');
        })
        
        ->orderBy('pinned' , 'desc')
        ->orderBy('created_at' , 'desc');

        if(isset($params['per_page'])) {
            return $categories->paginate($params['per_page']);
        }

        return $categories->get();

    }

    public function storeGallery(array $data)
    {
        if (isset($data['url'])) {
            if ($data['url'] instanceof UploadedFile) {
                $data['url'] = $this->uploadImage($data['url'], 'gallery');
            }
        }

        if(isset($data['is_banner']) && boolval($data['is_banner'])) {
            $this->model->where('is_banner', 1)->update(['is_banner' => 0]);
        } 
        return $this->create($data);
    }

    public function updateGallery(Gallery $gallery , array $data)
    {
        if (isset($data['url'])) {
            if ($data['url'] instanceof UploadedFile) {
                $data['url'] = $this->uploadImage($data['url'], 'gallery');
            }
        }
        
        if(isset($data['is_banner']) && boolval($data['is_banner'])) {
            $this->model->where('is_banner', 1)->update(['is_banner' => 0]);
        } 

        return $this->update( $gallery, $data);
    }
}
