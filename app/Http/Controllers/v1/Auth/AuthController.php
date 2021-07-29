<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
    public function ApiRegister(Request $request)
    {
        $register = Http::post('http://127.0.0.1:8080/api/register', [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return $register;
    }
    
    public function ApiLogin(Request $request)
    {
        $login = Http::post('http://127.0.0.1:8080/api/register', [
            ''
        ]);
    }
}