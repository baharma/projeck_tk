<?php

namespace App\Repositories\Eloquent;

use App\Models\CategoryClass;
use App\Repositories\CategoryClassRepository;
use App\Repositories\Eloquent\EloquentBaseRepository;



 class EloquentCategoryClassRepository extends EloquentBaseRepository implements CategoryClassRepository{

    public function getAll(){
        return $this->model->all();
    }

    public function createAt(array $data){
        return $this->model->create($data);
    }
    public function updates(int $id,array $data){
        return $this->model->find($id)->update($data);
    }

    public function deletes(int $id){
        return $this->model->find($id)->delete();
    }
}
