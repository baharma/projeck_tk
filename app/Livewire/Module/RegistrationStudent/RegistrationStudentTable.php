<?php

namespace App\Livewire\Module\RegistrationStudent;

use App\Repositories\CategoryClassRepository;
use App\Repositories\RegistrationStudentRepository;
use PDF;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RegistrationStudentTable extends Component
{
    use WithPagination;
    public $form = [
        'status'=>false,
        'date_start'=>'',
        'date_end'=>''
    ];
    public $kelas,$idStudent;
    public $catagorryClass;
    protected $repositoruStudenKategory;
    protected $queryString = [
        'search' => [
            'except' => ''
        ]
    ];

    public function __construct()
    {
        $this->repositoruStudenKategory = App(CategoryClassRepository::class);
    }
    public $search = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function mount(){
        $this->catagorryClass = $this->repositoruStudenKategory->getAll();
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

    public function save(){
        return redirect()->route('pdf-registrasi',[
            'status' => $this->form['status'],
            'date_start' => $this->form['date_start'],
            'date_end' => $this->form['date_end'],
        ]);
    }
    public function getIdToClass(int $id){
        $this->idStudent = $id;
    }
    public function saveEdit(){
        $repo = app(RegistrationStudentRepository::class);
        $registration = $repo->find($this->idStudent);
        $repo->updateStudent($registration, ['class_id'=>$this->kelas]);
        $this->dispatch('swal:modal', [
            'title' => 'Berhasil Memasukan Kelas',
            'type' => 'success',
            'text' => '',
        ]);
        $this->dispatch("closeModalkelas");
    }

    public function resetForm()
    {
        $this->dispatch('reset')->to(ModalRegistrationStudent::class);
    }
}
