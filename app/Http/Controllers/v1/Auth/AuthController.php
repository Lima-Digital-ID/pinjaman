<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function login()
    {
        return view('auth.login');
    }
}