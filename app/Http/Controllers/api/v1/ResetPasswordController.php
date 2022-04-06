<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Traits\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use function response;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
}
