<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyService
{
    private CompanyRepository $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function getUserCompanies()
    {
        return $this->repository
            ->getUserCompanies()
            ->companies;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createUserCompany($attributes)
    {
       return Auth::user()->companies()
           ->create($attributes);
    }
}
