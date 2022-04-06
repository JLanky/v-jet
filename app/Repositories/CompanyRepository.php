<?php

namespace App\Repositories;

use App\Models\Company as Model;
use Illuminate\Support\Facades\Auth;

class CompanyRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getUserCompanies()
    {
        return Auth::user()
            ->with(['companies:id,user_id,title,phone,description'])
            ->first();
    }
}
