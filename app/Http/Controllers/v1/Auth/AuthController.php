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
        $url = \Config::get('api_config.register');
        $register = Http::post($url, [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $requestRegister = json_decode($register, false);

        if ($requestRegister->status == 'success') {
            return redirect()
                        ->route('login');
        }
    }
    
    public function ApiLogin(Request $request)
    {
        $url = \Config::get('api_config.login');
        $login = Http::post($url, [
            'email' => $request->email,
            'password' => $request->password
        ]);

        $requestLogin = json_decode($login, false);

        if ($requestLogin->status == 'success') {
            return redirect()
                        ->route('dashboard');
        }
    }
}