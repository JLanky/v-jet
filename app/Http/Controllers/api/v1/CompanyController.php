<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    private $service;

    /**
     * @param CompanyService $service
     */
    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserCompanies(Request $request)
    {
        return $this->getResponseSignature(
            self::RESPONSE_SUCCESS,
            $this->service
                ->getUserCompanies()
        );
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createUserCompany(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:150',
            'phone' => 'required|numeric|digits_between:5,100',
            'description' => 'required|string|max:500',
        ]);

        try {
        $this->service->createUserCompany($request->all());

        return $this->getResponseSignature(self::RESPONSE_CREATED);
        } catch (\Exception $e) {
            return $this->getResponseSignature(self::RESPONSE_CREATE_COMPANY_FAILED);
        }
    }
}
