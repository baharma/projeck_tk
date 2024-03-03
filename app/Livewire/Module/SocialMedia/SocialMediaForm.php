<?php

namespace App\Livewire\Module\SocialMedia;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use App\Repositories\SocialMediaRepository;
use COM;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class SocialMediaForm extends Component
{

    public $social_medias = [];


    protected $repository;

    public function __construct()
    {
        $this->repository = app(SocialMediaRepository::class);
    }

    public function submitForm()
    {

        $company = $this->repository->updateSocialMedia($this->social_medias);

        $this->setForm($company);
        $this->dispatch('updateSuccess', $company)->self();
    }

    public function mount()
    {
        $this->setForm($this->repository->all());

    }

    public function render()
    {
        return view('livewire.module.social-media.social-media-form');
    }



    public function setForm(Collection $datas)
    {
        $this->social_medias = $datas->toArray();
    }

    public function renderComponent()
    {
        $this->render();
    }
}
