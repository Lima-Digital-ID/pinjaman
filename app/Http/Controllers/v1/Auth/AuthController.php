<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

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

        $validated = $request->validate([
            'nama'              => 'required',
            'no_hp'             => 'required',
            'email'             => 'required',
            'password'          => 'required'
        ], [
            'required' => ':attribute harus diisi.'
        ], [
            'nama'      => 'Nama',
            'no_hp'     => 'No.Handphone',
            'email'  => 'Email',
            'password'  => 'Password'
        ]);
        
        
        $url = \Config::get('api_config.register');
        $response = Http::post($url, [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $requestRegister = json_decode($response, false);

        if ($requestRegister->status == 'success') {

            Alert::success('Success Title', 'Success Message');
            return redirect()
                        ->route('login')->withStatus('Berhasil mendaftar, silahkan login.');
        }
        else if (strpos($requestRegister->message, 'nasabah_email_unique') !== false) {
            return back()->withError('Email telah digunakan');
        }
        else {
            // gagal
            return back()->withError('Gagal mendaftar');
        }
    }
    
    public function ApiLogin(Request $request)
    {

        $validated = $request->validate([
            'email'             => 'required',
            'password'          => 'required'
        ], [
            'required' => ':attribute harus diisi.'
        ], [
            'email'  => 'Email',
            'password'  => 'Password'
        ]);

        $url = \Config::get('api_config.login');
        $login = Http::post($url, [
            'email' => $request->email,
            'password' => $request->password
        ]);

        $requestLogin = json_decode($login, false);

        // return $requestLogin;
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

            // return $login['data'];

            // Session
            Session::put('token', $requestLogin->token);
            Session::put('foto_profil', $login['data']['foto_profil']);
            Session::put('nama', $login['data']['nama']);
            Session::put('email', $login['data']['email']);
            Session::put('no_hp', $login['data']['no_hp']);
            Session::put('tanggal_lahir', $login['data']['tanggal_lahir']);
            Session::put('tempat_lahir', $login['data']['tempat_lahir']);
            Session::put('alamat', $login['data']['alamat']);
            Session::put('is_verified', $login['data']['is_verified']);
            Session::put('score', $login['data']['skor']);
            Session::put('syarat_pinjaman_umroh', $login['data']['syarat_pinjaman_umroh']);
            Session::put('kelengkapan_data', $login['data']['syarat_pinjaman_umroh']);
            
            Session::put('foto_profil', $login['data']['foto_profil']);
            return redirect()
                        ->route('dashboard');
        }
        else if($requestLogin->status == 'Unauthorized') {
            // return 'password salah';
            return redirect()->back()->withError('password salah');
        }
        else if($requestLogin->status == 'failed' && strpos(strtolower($requestLogin->message), 'akun tidak ditemukan') !== false) {
            // return 'akun tidak ditemukan';
            return redirect()->back()->withError('akun tidak ditemukan');
        }
        else {
            // return 'terjadi kesalahan';
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