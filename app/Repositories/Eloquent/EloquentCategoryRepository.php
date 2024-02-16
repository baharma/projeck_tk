<?php

namespace App\Repositories\Eloquent;

use App\Events\UserWasCreated;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
{
    
}
