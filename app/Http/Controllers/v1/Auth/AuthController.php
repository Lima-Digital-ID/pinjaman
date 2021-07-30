<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function register()
    {
        if(Session::has('token')) 
            return redirect()->back();
    }
    public function login()
    {
        if(Session::has('token')) 
            return redirect()->back();
    }
    public function ApiRegister(Request $request)
    {
        // $url = \Config::get('http://127.0.0:8080/register');
        $register = Http::post('http://127.0.0:8080/register', [
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

        // return $requestLogin;
        if ($requestLogin->status == 'success') {
            \Session::put('token', $requestLogin->token);
            return redirect()
                        ->route('dashboard');
        }
        else if($requestLogin->status == 'Unauthorized') {
            return 'password salah';
            return redirect()->back()->withError('password salah');
        }
        else if($requestLogin->status == 'failed' && strpos(strtolower($requestLogin->message), 'akun tidak ditemukan') !== false) {
            return 'akun tidak ditemukan';
            return redirect()->back()->withError('akun tidak ditemukan');
        }
        else {
            return 'terjadi kesalahan';
            return redirect()->back()->withError('terjadi kesalahan');
        }
    }

    public function ApiLogout()
    {
        if(!Session::has('token')) 
            return redirect()->back();
        $token = Session::get('token');
        $url = \Config::get('api_config.logout');
        $logout = Http::withToken($token)->get($url);

        $requestLogout = json_decode($logout, false);

        // return $requestLogin;
        if ($requestLogout->status == 'success') {
            Session::flush();
            return redirect()
                        ->route('login');
        }
        else {
            return 'terjadi kesalahan';
            return redirect()->back()->withError('terjadi kesalahan');
        }
    }
}