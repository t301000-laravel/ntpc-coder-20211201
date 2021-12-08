<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }


    public function openidLogin()
    {
        // dd(session(config('ntpcopenid.sessionKey')));

        $data = session(config('ntpcopenid.sessionKey'));

        $name = $data['namePerson'];
        $email = $data['contact/email'];
        $password = '12345678';

        //$user = User::where('email', '=', $email)->first();
        // $user = User::where('email', $email)->first();
        // //$user = User::whereEmail($email)->first();
        // if ($user) {
        //     // 有資料
        //     // $user->name = $name;
        //     // $user->save();
        //
        //     $user->update(['name' => $name]);
        // }else{
        //     // 沒資料
        //     $user = User::create([
        //         'name' => $name,
        //         'email' => $email,
        //         'password' => bcrypt($password),
        //     ]);
        // }

        $user = User::updateOrCreate(
            ['email' => $email], // 篩選條件
            [
                'name' => $name,
                'password' => bcrypt($password)
            ] // 其他資料
        );
        //$user->update(['name' => $name]); // 更新資料
        auth()->login($user);

        return redirect()->intended('/profile');
    }
}
