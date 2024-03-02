<?php

namespace App\Repositories\Eloquent;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use App\Traits\UploadHandler;
use Illuminate\Http\UploadedFile;

class EloquentCompanyRepository extends EloquentBaseRepository implements CompanyRepository
{
    use UploadHandler;

    public function updateCompany(Company $company, array $data)
    {
        if (isset($data['logo'])) {
            if ($data['logo'] instanceof UploadedFile) {
                $data['logo'] = $this->uploadImage($data['logo'], 'company');
            }
        }

        $model = $this->update($company, $data);

        return $model;

    }
}
