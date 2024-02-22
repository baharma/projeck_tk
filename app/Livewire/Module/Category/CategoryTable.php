<?php

namespace App\Livewire\Module\Category;

use App\Repositories\CategoryRepository;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class CategoryTable extends Component
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
        $repo = app(CategoryRepository::class);
        $params = [
            'search' => $this->search,
            'per_page' => 10
        ];

        $categories = $repo->list($params);
        

        return view('livewire.module.category.category-table' , compact('categories'));
    }

    public function find($id)
    {
        $this->dispatch('find' , $id)->to(ModalCategory::class);
    }

    public function deleteConfirm($id)
    {
        

        $this->dispatch('swal:confirm' , [
            'title' => 'Apakah anda yakin?',
            'text' => '',
            'param' => $id,
            'listener' => 'delete',
        ]);
    }

    #[On(['delete'])]
    public function delete($id) 
    {

        $repo = app(CategoryRepository::class);
        $model = $repo->find($id);

        $repo->destroy($model);

        $this->dispatch('swal:modal', [
            'title' => 'Berhasil hapus kategori',
            'type' => 'success',
            'text' => '',
        ]);
    }

    #[On(['createSuccess' , 'updateSuccess'])]
    public function renderComponent()
    {
        $this->render();
    }
}
