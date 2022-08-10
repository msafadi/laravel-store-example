<?php

namespace App\Actions\Fortify;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateUser
{
    public function authenticate($request)
    {

        $username = $request->post( config('fortify.username') );
        $password = $request->post('password');

        $user = Admin::where('username', '=', $username)
            ->orWhere('email', '=', $username)
            ->orWhere('phone_number', '=', $username)
            ->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return false;

    }
}