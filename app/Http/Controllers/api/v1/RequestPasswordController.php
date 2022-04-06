<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;

use App\Traits\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class RequestPasswordController extends Controller
{
    use SendsPasswordResetEmails;


    public function __construct()
    {
        $this->broker = 'users';
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, ['email' => 'required|email|exists:users,email']);

        return $this->sendResetLinkEmail($request);
    }
}
