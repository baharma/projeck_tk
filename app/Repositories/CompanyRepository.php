<?php 

namespace App\Repositories;

use App\Models\Company;
use App\Models\User;

interface CompanyRepository {
    public function updateCompany(Company $company, array $data);
}