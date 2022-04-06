<?php

namespace App\Services\Auth;

use App\Models\User;

class RegisterService
{
    public function addNewRecord($attributes)
    {
        $attributes['password'] = app('hash')->make($attributes['password']);
        return User::create($attributes);
    }
}
