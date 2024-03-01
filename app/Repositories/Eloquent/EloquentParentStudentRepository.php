<?php

namespace App\Repositories\Eloquent;

use App\Events\UserWasCreated;
use App\Models\User;
use App\Repositories\ParentStudentRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class EloquentParentStudentRepository extends EloquentBaseRepository implements ParentStudentRepository
{
    
}
