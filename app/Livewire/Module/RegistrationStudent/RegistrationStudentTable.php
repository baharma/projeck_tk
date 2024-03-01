<?php

namespace App\Livewire\Module\RegistrationStudent;

use App\Repositories\RegistrationStudentRepository;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RegistrationStudentTable extends Component
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
        $repo = app(RegistrationStudentRepository::class);
        $params = [
            'search' => $this->search,
            'per_page' => 10
        ];

        $registrations = $repo->list($params);


        return view('livewire.module.registration-student.registration-student-table' , compact('registrations'));
    }

    public function find($id)
    {
        $this->dispatch('find' , $id)->to(ModalRegistrationStudent::class);
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

        $repo = app(RegistrationStudentRepository::class);
        $model = $repo->find($id);

        $repo->destroy($model);

        $this->dispatch('swal:modal', [
            'title' => 'Berhasil hapus registrasi',
            'type' => 'success',
            'text' => '',
        ]);
    }

    #[On(['createSuccess' , 'updateSuccess'])]
    public function renderComponent()
    {
        $this->render();
    }

    public function resetForm()
    {
        $this->dispatch('reset')->to(ModalRegistrationStudent::class);
    }
}
