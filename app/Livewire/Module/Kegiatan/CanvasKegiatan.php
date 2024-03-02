<?php

namespace App\Livewire\Module\Kegiatan;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use ilLuminate\Support\Str;
use Livewire\Attributes\On;

class CanvasKegiatan extends Component
{
    use WithFileUploads;

    public $model,$kegiatan,$update;
    public $title, $article, $status,$thumnail;

    public function mount(Post $post)
    {

        $this->model = $post;
        $this->kegiatan = Category::where('name','Kegiatan')->first();
    }

    public function save(){
        $repository = app(PostRepository::class);
        $image = uploadImageHelper($this->thumnail,'Kegiatan');
        $data = [
            'title'=>$this->title,
            'slug'=>Str::slug($this->title),
            'thumnail'=>$image,
            'article'=>$this->article,
            'status'=>$this->status,
            'created_by'=>Auth::user()->id
        ];
        $repository->createPost($data, [$this->kegiatan]);
        $this->dispatch('closeCanvas');
        $this->dispatch('succes','Kegiatan Save !!');
        $this->dispatch('refreshKegiatan');
        $this->clearSave();
    }

    public function clearSave(){
        $this->fill([
            'title'=>'',
            'article'=>'',
            'status'=>'',
            'thumnail'=>'',
            'update'=>''
        ]);
    }

    #[On('EditKegiatan')]
    public function EditKegiatan($id){
        $data = $this->model->find($id);
        $this->fill([
            'title'=>$data->title,
            'article'=>$data->article,
            'status'=>$data->status,
            'thumnail'=>$data->thumnail,
        ]);

    }

    public function render()
    {
        return view('livewire.module.kegiatan.canvas-kegiatan');
    }
}
