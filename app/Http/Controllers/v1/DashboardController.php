<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    private $params;

    public function index()
    {
        $url = \Config::get('api_config.limit_pinjaman');
        $token = Session::get('token');
        $limitPinjaman = Http::withToken($token)
                            ->get($url);
        // return $limitPinjaman;
        return view('borrower.dashboard');
    }
}
