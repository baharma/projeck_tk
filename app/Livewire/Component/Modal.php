<?php

namespace App\Livewire\Component;

use Livewire\Component;

class Modal extends Component
{
    public $image,$modalName,$name;
    public function render()
    {
        return view('livewire.component.modal');
    }
}
