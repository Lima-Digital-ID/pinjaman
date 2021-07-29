<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    private $params;

    public function index()
    {
        $url = \Config::get('api_config.limit_pinjaman');
        $limitPinjaman = Http::withToken('2|q7VZRXQn0XR1SOBxRIizJ3A9ZelzF8ujKtBRBgpf')
                            ->get($url);
        return $limitPinjaman;
        return view('borrower.dashboard');
    }
}
