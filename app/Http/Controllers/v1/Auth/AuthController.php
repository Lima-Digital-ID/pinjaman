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

        // return $requestLogin->data;
        if ($requestLogin->status == 'success') {

            $url_limit = \Config::get('api_config.limit_pinjaman');

            $limitPinjaman = Http::withToken($requestLogin->token)
                            ->get($url_limit);

            $eLimitPinjaman = json_decode($limitPinjaman, false);

            if($eLimitPinjaman->status == 'success') {
                Session::put('limit_pinjaman', $eLimitPinjaman->data->limit_pinjaman);
            }
            else {
                $this->params['limit'] = null;
            }
            Session::put('token', $requestLogin->token);
            Session::put('nama', $login['data']['nama']);
            Session::put('foto_profil', $login['data']['foto_profil']);
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