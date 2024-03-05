<?php

namespace App\Livewire\Module\Gallery;

use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class ModalGallery extends Component
{

    use WithFileUploads;

    public $name = null;
    public $url = null;
    public $pinned = 0;

    public $title = 'Tambah Galeri';

    public $id = null;

    protected $repository;


    public function __construct()
    {
        $this->repository = app(GalleryRepository::class);
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'url' => 'required',
            'pinned' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama tidak boleh kosong.',
            'url.required' => 'Kolom gambar tidak boleh kosong.',
            'pinned' => 'Kolom pin tidak boleh kosong.',
        ];
    }

    public function render()
    {
        return view('livewire.module.gallery.modal-gallery');
    }

    public function submitForm()
    {
        $this->validate();

        if (is_null($this->id)) {
            $gallery = $this->repository->storeGallery([
                'name' => $this->name,
                'url' => $this->url,
                'pinned' => $this->pinned,
            ]);

            $this->dispatch('createSuccess', $gallery)->to(GalleryTable::class);
            $this->dispatch('createSuccess', $gallery)->self();
        } else {
            $gallery = $this->repository->find($this->id);
            $this->repository->updateGallery($gallery, [
                'name' => $this->name,
                'url' => $this->url,
                'pinned' => $this->pinned,
            ]);

            $this->dispatch('updateSuccess', $gallery)->to(GalleryTable::class);
            $this->dispatch('updateSuccess', $gallery)->self();
        }
    }

    #[On('find')]
    public function find($id)
    {
        $this->resetForm();

        $gallery = $this->repository->find($id);

        $this->id = $gallery->id;
        $this->name = $gallery->name;
        $this->url = $gallery->url;
        $this->pinned = $gallery->pinned;

        if (!is_null($this->id)) {
            $this->title = 'Edit Galeri';
        }
    }

    #[On(['createSuccess', 'updateSuccess'])]
    public function renderComponent()
    {
        $this->render();
    }

    #[On(['createSuccess', 'updateSuccess' , 'reset'])]
    public function resetForm()
    {
        $this->title = 'Tambah Galeri';
        $this->id = null;
        $this->name = null;
        $this->pinned = 0;
        $this->url = null;
    }
}
