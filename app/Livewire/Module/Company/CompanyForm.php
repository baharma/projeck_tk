<?php

namespace App\Livewire\Module\Company;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyForm extends Component
{

    use WithFileUploads;

    public $id = null;
    public $name = null;
    public $address = null;
    public $description = null;
    public $logo = null;

    protected $company_repo;

    public function __construct()
    {
        $this->company_repo = app(CompanyRepository::class);
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'address' => 'required|string',
            // 'logo' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Kolom nama tidak boleh kosong.',
            'address' => 'Kolom alamat tidak boleh kosong.',
            // 'logo' => 'Kolom logo tidak boleh kosong.',
            'description' => 'Kolom deskripsi tidak boleh kosong.',
        ];
    }

    public function submitForm()
    {
        $this->validate();
        
        $model = $this->company_repo->find($this->id);
        $company = $this->company_repo->updateCompany($model, [
            'name' => $this->name,
            'address' => $this->address,
            'logo' => $this->logo,
            'description' => $this->description,
        ]);

        $this->setForm($company);
        $this->dispatch('updateSuccess', $company)->self();
    }

    public function render()
    {
        if(is_null($this->id)) {
            $company = $this->company_repo->first();
            if (!is_null($company)) {
                $this->setForm($company);
            }
        }

        return view('livewire.module.company.company-form');
    }

    

    public function setForm(Company $company)
    {
        $this->id = $company->id;
        $this->name = $company->name;
        $this->address = $company->address;
        $this->description = $company->description;
        $this->logo = $company->logo;
    }

    public function renderComponent()
    {
        $this->render();
    }
}
