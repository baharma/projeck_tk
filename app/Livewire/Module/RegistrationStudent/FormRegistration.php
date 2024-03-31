<?php

namespace App\Livewire\Module\RegistrationStudent;

use App\Models\Education;
use App\Models\Religion;
use App\Repositories\ParentStudentRepository;
use App\Repositories\RegistrationStudentRepository;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormRegistration extends Component
{
    use WithFileUploads;

    public $name = null;
    public $gender = null;
    public $religion_id = null;
    public $place_of_birth = null;
    public $date_of_birth = null;
    public $address = null;
    public $number_of_siblings = null;
    public $height = null;
    public $weight = null;
    public $phone = null;
    public $kk_image = null;
    public $akta_image = null;

    public $title = 'Tambah Registrasi';

    public $id = null;

    public $parents = [];

    protected $repository, $parent_repo;


    public function __construct()
    {
        $this->repository = app(RegistrationStudentRepository::class);
        $this->parent_repo = app(ParentStudentRepository::class);
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'gender' => 'required|string',
            'religion_id' => 'required|string',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Kolom nama tidak boleh kosong.',
            'gender' => 'Kolom jenis kelamin tidak boleh kosong',
            'religion_id' => 'Kolom agama tidak boleh kosong',
            'place_of_birth' => 'Kolom tempat lahir tidak boleh kosong',
            'date_of_birth' => 'Kolom tanggal lahir tidak boleh kosong',
            'address' => 'Kolom alamat tidak boleh kosong',
        ];
    }

    public function render()
    {
        $religions = Religion::all();
        $educations = Education::all();

        return view('livewire.module.registration-student.card-form-registration', [
            'religions' => $religions,
            'educations' => $educations,
        ]);
    }

    public function submitForm()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'gender' => $this->gender,
            'religion_id' => $this->religion_id,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'phone' => $this->phone,
            'number_of_siblings' => $this->number_of_siblings,
            'height' => $this->height,
            'weight' => $this->weight,
            'kk_image' => $this->kk_image,
            'akta_image' => $this->akta_image,
        ];

        if (is_null($this->id)) {
            $registration = $this->repository->createStudent($data);
            $parents = array_map(function ($data) use ($registration) {
                $data['registration_student_id'] = $registration->id;
                return $data;
            }, $this->parents);

            $this->saveParent($parents);

            $this->dispatch('createSuccess', $registration)->to(RegistrationStudentTable::class);
            $this->dispatch('createSuccess', $registration)->self();
        } else {
            $registration = $this->repository->find($this->id);
            $this->repository->updateStudent($registration, $data);

            $this->saveParent($this->parents);

            $this->dispatch('updateSuccess', $registration)->to(RegistrationStudentTable::class);
            $this->dispatch('updateSuccess', $registration)->self();
        }

        $this->resetForm();
    }

    public function saveParent($parents = [])
    {
        foreach ($parents as $parent) {
            $parent_model = null;
            if (isset($parent['id'])) {
                $parent_model = $this->parent_repo->find($parent['id']);
                $this->parent_repo->update($parent_model, $parent);
            } else {
                $this->parent_repo->create($parent);
            }
        }
    }

    #[On('find')]
    public function find($id)
    {
        $this->resetForm();

        $registration = $this->repository->find($id);

        $this->id = $registration->id;
        $this->name = $registration->name;
        $this->gender = $registration->gender;
        $this->religion_id = $registration->religion_id;
        $this->place_of_birth = $registration->place_of_birth;
        $this->date_of_birth = $registration->date_of_birth;
        $this->address = $registration->address;
        $this->phone = $registration->phone;
        $this->number_of_siblings = $registration->number_of_siblings;
        $this->height = $registration->height;
        $this->weight = $registration->weight;
        $this->kk_image = $registration->kk_image;
        $this->akta_image = $registration->akta_image;
        $this->parents = $registration->parents->sortBy('type')->toArray();

        if (!is_null($this->id)) {
            $this->title = 'Edit Registrasi';
        }
    }

    #[On(['createSuccess', 'updateSuccess'])]
    public function renderComponent()
    {
        $this->render();
    }

    #[On(['createSuccess', 'updateSuccess', 'reset'])]
    public function resetForm()
    {
        $this->title = 'Tambah Registrasi';
        $this->id = null;
        $this->name = null;
        $this->gender = null;
        $this->religion_id = null;
        $this->place_of_birth = null;
        $this->date_of_birth = null;
        $this->address = null;
        $this->phone = null;
        $this->number_of_siblings = null;
        $this->height = null;
        $this->weight = null;
        $this->kk_image = null;
        $this->akta_image = null;
        $this->parents = [];
    }
}
