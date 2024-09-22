<?php

namespace App\Livewire\Module\CategoryClassStudent;

use App\Repositories\CategoryClassRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoryClass extends Component
{
    protected $repositoryCategoryClass;
    public $name,$idCategory;
    protected $rules =[
        'name'=>'required'
    ];

    public function __construct()
    {
        $this->repositoryCategoryClass = App(CategoryClassRepository::class);
    }

    public function save(){
        $this->validate();
        if($this->idCategory){
            $this->repositoryCategoryClass->updates($this->idCategory,['name'=>$this->name]);
        }else{
            $this->repositoryCategoryClass->createAt(['name'=>$this->name]);
        }
        $this->dispatch('updateSuccess');
        $this->clearInput();
    }

    public function getIdUpdate(int $id,string $name){
        $this->idCategory = $id;
        $this->name = $name;
    }

    public function clearInput(){
        $this->name = '';
    }

    #[On("deleteClassCategory")]
    public function deleteClassCategory($id){
        $this->repositoryCategoryClass->deletes($id);
    }

    public function render()
    {
        $category = $this->repositoryCategoryClass->getAll();
        return view('livewire.module.category-class-student.category-class',
            ['classCategory'=>$category]
        );
    }
}
