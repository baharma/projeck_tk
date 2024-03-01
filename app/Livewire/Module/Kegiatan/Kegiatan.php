<?php

namespace App\Livewire\Module\Kegiatan;

use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class Kegiatan extends Component
{
    public $model;
    public function mount(Post $post)
    {
        $this->model = $post;
    }

    public function render()
    {

        $kegiatan = Category::where('name','Kegiatan')->first();
        $data = $kegiatan->posts;
        return view('livewire.module.kegiatan.kegiatan',compact('data'));
    }

    #[On('deleteThis')]
    public function deleteThis($id){
        $repo = app(PostRepository::class);
        $repo->deletePost($this->model->find($id));
        $this->render();
    }


    #[On('refreshKegiatan')]
    public function refreshKegiatan(){
        $this->render();
    }
    public function edit($id){
        $this->dispatch('EditKegiatan',$id);
    }
}
