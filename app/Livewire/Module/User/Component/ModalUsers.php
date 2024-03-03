<?php

namespace App\Livewire\Module\User\Component;

use App\Livewire\Module\User\Users;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class ModalUsers extends Component
{

    public $id = null;
    public $name = null;
    public $email = null;
    public $password = null;

    public $title = 'Tambah User';

    protected $repository;


    public function __construct()
    {
        $this->repository = app(UserRepository::class);
    }

    public function rules()
    {
        $email_rules = ['required' , 'string',  'email'];

        if(is_null($this->id)) {
            array_push($email_rules , 'unique:users');
        }else {
            array_push($email_rules , Rule::unique('users')->ignore($this->id));
        }

        return [
            'name' => 'required|string',
            'email' => $email_rules,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama tidak boleh kosong.',
            'email.required' => 'Kolom email tidak boleh kosong.',
            'email.unique' => 'Email anda telah digunakan.',
        ];
    }

    public function render()
    {
        return view('livewire.module.user.component.modal-users');
    }

    public function submitForm()
    {
        $this->validate();

        if (is_null($this->id)) {
            $user = $this->repository->createUser([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]);

            $this->dispatch('createSuccess', $user)->to(Users::class);
            $this->dispatch('createSuccess', $user)->self();
        } else {
            $user = $this->repository->find($this->id);

            $data = [
                'name' => $this->name,
                'email' => $this->email,
            ];

            if(!is_null($this->password)) {
                $data['password'] = $this->password;
            }
            $this->repository->update($user, $data);

            $this->dispatch('updateSuccess', $user)->to(Users::class);
            $this->dispatch('updateSuccess', $user)->self();
        }
    }

    #[On('find')]
    public function find($id)
    {
        $this->resetForm();

        $user = $this->repository->find($id);

        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;

        if (!is_null($this->id)) {
            $this->title = 'Edit User';
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
        $this->title = 'Tambah User';
        $this->id = null;
        $this->name = null;
        $this->email = null;
        $this->password = null;
    }
}
