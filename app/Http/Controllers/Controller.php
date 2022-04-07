<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    const RESPONSE_SUCCESS = 'success';
    const RESPONSE_CREATED = 'created';
    const RESPONSE_UNAUTHORIZED = 'unauthorized';
    const RESPONSE_REGISTRATION_FAILED = 'registration_failed';
    const RESPONSE_CREATE_COMPANY_FAILED = 'create_company_failed';
    const RESPONSE_USER_TOKEN = 'token';


    protected function getResponseSignature(string $responseType, $data = []): JsonResponse
    {
        switch ($responseType) {
            case self::RESPONSE_SUCCESS:
                return response()->json([
                    'status' => true,
                    'data' => $data
                ], Response::HTTP_OK);

            case self::RESPONSE_CREATED:
               return response()->json([
                   'status' => true,
                   'message' => 'CREATED',
               ], Response::HTTP_CREATED);

            case self::RESPONSE_UNAUTHORIZED:
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized'],
                    Response::HTTP_CONFLICT);

            case self::RESPONSE_REGISTRATION_FAILED:
              return response()->json([
                  'status' => false,
                  'message' => 'User Registration Failed!'],
                  Response::HTTP_CONFLICT);

            case self::RESPONSE_CREATE_COMPANY_FAILED:
                return response()->json([
                    'status' => false,
                    'message' => 'Creating user company Failed!'],
                    Response::HTTP_CONFLICT);

            case self::RESPONSE_USER_TOKEN:
                return response()->json([
                    'token' => $data,
                    'token_type' => 'bearer',
                    'expires_in' => Auth::factory()->getTTL() * 60
                ], Response::HTTP_OK);
        }
        return response()->json('', Response::HTTP_BAD_REQUEST);
    }
}
