<?php

namespace App\Livewire\Module\Category;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class ModalCategory extends Component
{

    public $name = null;

    public $title = 'Tambah Kategori';

    public $id = null;

    protected $repository;


    public function __construct()
    {
        $this->repository = app(CategoryRepository::class);
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Kolom nama tidak boleh kosong.',
        ];
    }

    public function render()
    {
        return view('livewire.module.category.modal-category');
    }

    public function submitForm() 
    {
        $this->validate();

        if(is_null($this->id)) {
            $category = $this->repository->create([
                'name' => $this->name,
            ]);

            $this->dispatch('createSuccess', $category)->to(CategoryTable::class);
            $this->dispatch('createSuccess', $category)->self();
        }else {
            $category = $this->repository->find($this->id);
            $this->repository->update($category, [
                'name' => $this->name
            ]);

            $this->dispatch('updateSuccess', $category)->to(CategoryTable::class);
            $this->dispatch('updateSuccess', $category)->self();
        }

    }

    #[On('find')]
    public function find($id)
    {
        $this->resetForm();

        $category = $this->repository->find($id);

        $this->id = $category->id;
        $this->name = $category->name;

        if(!is_null($this->id)) {
            $this->title = 'Edit Kategori';
        }
    }

    #[On(['createSuccess' , 'updateSuccess'])]
    public function renderComponent()
    {
        $this->render();
    }

    #[On(['createSuccess', 'updateSuccess'])]
    public function resetForm()
    {
        $this->title = 'Tambah Kategori';
        $this->id = null;
        $this->name = null;
    }
}
