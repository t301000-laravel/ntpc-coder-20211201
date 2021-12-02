<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OpenidController extends Controller
{
    public function profile()
    {
        // dd(session(config('ntpcopenid.sessionKey')));

        $data = session(config('ntpcopenid.sessionKey'));

        $name = $data['namePerson'];
        $email = $data['contact/email'];
        $password = '12345678';

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        dd($user);
    }
}
