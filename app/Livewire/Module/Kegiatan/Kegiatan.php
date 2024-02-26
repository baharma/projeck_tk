<?php

namespace App\Livewire\Module\Kegiatan;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Repositories\PostRepository;
use Livewire\Component;

class Kegiatan extends Component
{
    public $model;
    public $title, $article, $status;

    public PostRepository $repository;

    public function mount(Post $post)
    {
        $this->model = $post;
    }

    public function render()
    {
        return view('livewire.module.kegiatan.kegiatan');
    }

    public function save(){


    }

}
