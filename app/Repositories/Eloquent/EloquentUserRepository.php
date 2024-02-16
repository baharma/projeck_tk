<?php

namespace App\Repositories\Eloquent;

use App\Events\UserWasCreated;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
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
