<?php

namespace App\Repositories\Eloquent;

use App\Events\FinishRegistration;
use App\Events\PendingRegistration;
use App\Events\UserWasCreated;
use App\Events\ValidRegistration;
use App\Models\RegistrationStudent;
use App\Models\User;
use App\Repositories\RegistrationStudentRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadHandler;

class EloquentRegistrationStudentRepository extends EloquentBaseRepository implements RegistrationStudentRepository
{
    use UploadHandler;

    public function finds(int $id){
        return $this->model->find($id);
    }
    public function createStudent(array $data)
    {
        if(isset($data['kk_image'])) {
            if($data['kk_image'] instanceof UploadedFile) {
                $data['kk_image'] = $this->uploadImage($data['kk_image'], 'dokumen');
            }
        }
        if(isset($data['akta_image'])) {
            if($data['akta_image'] instanceof UploadedFile) {
                $data['akta_image'] = $this->uploadImage($data['akta_image'], 'dokumen');
            }
        }

        $registration = $this->model->create($data);

        $this->changeStatus($registration, 'pending');

        return $registration;
    }

    public function updateStudent(RegistrationStudent $model , array $data)
    {
        if (isset($data['kk_image'])) {
            if ($data['kk_image'] instanceof UploadedFile) {
                $data['kk_image'] = $this->uploadImage($data['kk_image'], 'dokumen');
            }
        }

        if (isset($data['akta_image'])) {
            if ($data['akta_image'] instanceof UploadedFile) {
                $data['akta_image'] = $this->uploadImage($data['akta_image'], 'dokumen');
            }
        }

        $status_old = $model->status;

        $registration = $this->update($model , $data);

        if (isset($data['status'])) {
            if ($status_old != $data['status']) {
                $this->changeStatus($model, $data['status']);
            }
        }

        return $registration;
    }

    public function changeStatus(RegistrationStudent $model, $status)
    {
        if($status == 'valid') {
            event(new ValidRegistration($model));
        } else if ($status == 'pending') {
            event(new PendingRegistration($model));
        }
    }

    public function list(array $params)
    {

        $registrations = $this->model

            ->when(isset($params['search']), function ($q) use ($params) {
                $q->where('name', 'like', '%' . $params['search'] . '%');
            })

            ->orderByDesc('created_at');

        if (isset($params['per_page'])) {
            return $registrations->paginate($params['per_page']);
        }

        return $registrations->get();
    }

    public function orderDataRegistraasiStuden(array $data) {

        $query = RegistrationStudent::query();

        if (!empty($data['date_start']) && !empty($data['date_end'])) {
            try {
                $dateStart = \Carbon\Carbon::parse($data['date_start']);
                $dateEnd = \Carbon\Carbon::parse($data['date_end']);

                $query->whereBetween('created_at', [$dateStart->startOfDay(), $dateEnd->endOfDay()]);
            } catch (\Exception $e) {
                return collect();
            }
        }

        if (isset($data['status']) && $data['status'] !== null) {
            $query->where('status', $data['status']);
        }

        return $query->get();
    }

}
