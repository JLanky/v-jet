<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        return response()->json($this->service
            ->getUserCompanies(), Response::HTTP_OK);
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

        return response()->json([
            'status' => true,
            'message' => 'CREATED',
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Creating user company Failed!'], Response::HTTP_CONFLICT);
        }
    }
}
