<?php

namespace App\Livewire\Module\Gallery;

use App\Repositories\GalleryRepository;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class GalleryTable extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => [
            'except' => ''
        ]
    ];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $repo = app(GalleryRepository::class);
        $params = [
            'search' => $this->search,
            'per_page' => 10
        ];

        $galleries = $repo->list($params);


        return view('livewire.module.gallery.gallery-table', compact('galleries'));
    }

    public function find($id)
    {
        $this->dispatch('find', $id)->to(ModalGallery::class);
    }

    public function deleteConfirm($id)
    {


        $this->dispatch('swal:confirm', [
            'title' => 'Apakah anda yakin?',
            'text' => '',
            'param' => $id,
            'listener' => 'delete',
        ]);
    }

    #[On(['delete'])]
    public function delete($id)
    {

        $repo = app(GalleryRepository::class);
        $model = $repo->find($id);

        $repo->destroy($model);

        $this->dispatch('swal:modal', [
            'title' => 'Berhasil hapus kategori',
            'type' => 'success',
            'text' => '',
        ]);
    }

    #[On(['createSuccess', 'updateSuccess'])]
    public function renderComponent()
    {
        $this->render();
    }

    public function resetForm()
    {
        $this->dispatch('reset')->to(ModalGallery::class);
    }
}
