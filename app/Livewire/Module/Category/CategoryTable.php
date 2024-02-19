<?php

namespace App\Livewire\Module\Category;

use App\Repositories\CategoryRepository;
use Livewire\Component;
use Livewire\WithPagination;

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
}
