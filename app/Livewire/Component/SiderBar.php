<?php

namespace App\Livewire\Component;

use App\Models\Category;
use Livewire\Component;

class SiderBar extends Component
{
    public $category;

    public function mount(Category $category){
        $this->category = $category->all();
    }

    public function render()
    {
        return view('livewire.component.sider-bar');
    }
}
