<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function response;

class RegisterController extends Controller
{
    private RegisterService $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'email' => 'required|email|unique:users|max:150',
            'password' => 'required|string|max:150',
            'phone' => 'required|numeric|digits_between:5,100',
        ]);

        try {
        $this->service->addNewRecord($request->all());

        return response()->json([
            'status' => true,
            'message' => 'CREATED',
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User Registration Failed!'], Response::HTTP_CONFLICT);
        }
    }
}
