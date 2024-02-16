<?php

namespace App\Livewire\Module\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Users extends Component
{
    private $model;
    public function render()
    {
        $userAll = User::all();
        return view('livewire.module.user.users',compact('userAll'));
    }

    public function mount(User $user){
        $this->model = $user;
    }

    #[On('updateUserTable')]
    public function updateUserTable(){
        $this->render();
    }
}
