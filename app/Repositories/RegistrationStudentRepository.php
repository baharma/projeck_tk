<?php

namespace App\Repositories;

use App\Models\RegistrationStudent;
use App\Models\User;

interface RegistrationStudentRepository {

    public function createStudent(array $data);

    public function updateStudent(RegistrationStudent $model , array $data);

    public function changeStatus(RegistrationStudent $model , $status);

    public function list(array $params);

    public function orderDataRegistraasiStuden(array $data);

    public function finds(int $id);
}
