<?php

namespace App\Http\Controllers\user;

use App\Models\AddDoctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // porfilePage
    public function porfilePage()
    {
        return view('user.profile.profile');
    }
}
