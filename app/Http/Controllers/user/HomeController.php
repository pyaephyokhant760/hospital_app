<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // porfilePage
    public function porfilePage()
    {
        return view('user.profile.profile');
    }
}
