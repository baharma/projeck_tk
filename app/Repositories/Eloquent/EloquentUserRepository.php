<?php

namespace App\Repositories\Eloquent;

use App\Events\UserWasCreated;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    public function list(array $params)
    {

        $users = $this->model

            ->when(isset($params['search']), function ($q) use ($params) {
                $q->where('name', 'like', '%' . $params['search'] . '%')
                    ->orWhere('email' , 'like' , '%'.$params['search'].'%');
            })

            ->orderByDesc('created_at');

        if (isset($params['per_page'])) {
            return $users->paginate($params['per_page']);
        }

        return $users->get();
    }

    public function createUser(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $user = $this->model->create($data);

        return $user;

    }

    public function updateUser(User $user , array $data)
    {
        $user->fill($data);
        $user->save();

        return $user;
    }

    public function deleteUser(User $user)
    {
        
        return  $user->delete();
    }
    
}
