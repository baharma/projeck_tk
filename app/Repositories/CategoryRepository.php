<?php 

namespace App\Repositories;

use App\Models\User;

interface CategoryRepository {
    public function list(array $params);
}