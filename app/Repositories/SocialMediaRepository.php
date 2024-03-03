<?php 

namespace App\Repositories;

use App\Models\Company;
use App\Models\User;

interface SocialMediaRepository {
    public function updateSocialMedia(array $datas);
}