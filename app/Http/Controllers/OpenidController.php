<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OpenidController extends Controller
{
    public function profile()
    {
        return view('profile');
    }
}
