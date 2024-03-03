<?php

namespace App\Livewire\Module\User;

use App\Livewire\Module\User\Component\ModalUsers;
use App\Models\User;
use App\Repositories\UserRepository;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    private $model;
    protected $user_repo;
    public $search = '';



    protected $queryString = [
        'search' => [
            'except' => ''
        ]
    ];

    public function __construct()
    {
        $this->user_repo = app(UserRepository::class);
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $params = [
            'search' => $this->search,
            'per_page' => 10
        ];

        $userAll = $this->user_repo->list($params);

        return view('livewire.module.user.users',compact('userAll'));
    }

    public function mount(User $user){
        $this->model = $user;
    }

    #[On('updateUserTable')]
    public function updateUserTable(){
        $this->render();
    }

    public function find($id)
    {
        $this->dispatch('find', $id)->to(ModalUsers::class);
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

        $repo = app(UserRepository::class);
        $model = $repo->find($id);

        $repo->destroy($model);

        $this->dispatch('swal:modal', [
            'title' => 'Berhasil hapus pengguna',
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
        $this->dispatch('reset')->to(ModalUsers::class);
    }
}
