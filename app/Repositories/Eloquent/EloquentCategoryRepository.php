<?php

namespace App\Repositories\Eloquent;

use App\Events\UserWasCreated;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
{
    public function list(array $params)
    {
        
        $categories = $this->model

        ->when(isset($params['search']) , function($q) use ($params) {
            $q->where('name' , 'like' , '%'.$params['search'].'%');
        })
        
        ->orderByDesc('created_at');

        if(isset($params['per_page'])) {
            return $categories->paginate($params['per_page']);
        }

        return $categories->get();

    }
}
