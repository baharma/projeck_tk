<?php

namespace App\Livewire\Module\User\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ModalUsers extends Component
{
    public $password,$gmail,$name;
    public $model;

    public function render()
    {
        return view('livewire.module.user.component.modal-users');
    }

    public function mount(User $user){
        $this->model = $user;
    }

    public function save(){
        $data = [
            'name'=>$this->name,
            'email'=>$this->gmail,
            'password'=>Hash::make($this->password)
        ];

        $this->model->create($data);
        $this->dispatch('updateUserTable');
    }
}
