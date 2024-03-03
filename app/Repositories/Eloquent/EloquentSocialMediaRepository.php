<?php

namespace App\Repositories\Eloquent;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use App\Repositories\SocialMediaRepository;
use App\Traits\UploadHandler;
use Illuminate\Http\UploadedFile;

class EloquentSocialMediaRepository extends EloquentBaseRepository implements SocialMediaRepository
{
    use UploadHandler;

    public function updateSocialMedia(array $datas)
    {
        $updated = collect();

        foreach ($datas as $data) {
            if(isset($data['id']) && !is_null($data['id'])) {
                $model = $this->find($data['id']);
                $updated->push($this->update($model, $data));
            }
        }

        return $updated;
    }
}
