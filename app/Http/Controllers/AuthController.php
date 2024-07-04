<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //auth
    public function auth() {
        if (Auth::user()->role == 'user') {
           return redirect()->route('porfilePage');
        }else {
            return redirect()->route('adminHomePage');
        }
    }

    //homePage
    public function homePage() {
        return view('user.layout');
    }
}
