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
        $token = Session::get('token');

        $url_nasabah = \Config::get('api_config.get_nasabah');
        $nasabah = Http::withToken($token)
                        ->get($url_nasabah);

        $eNasabah = json_decode($nasabah, false);

        if($eNasabah->status == 'success') {
            Session::put('is_verified', $eNasabah->data->is_verified);
        }

        $url_limit = \Config::get('api_config.limit_pinjaman');
        $limit = Http::withToken($token)
                        ->get($url_limit);

        $eLimit = json_decode($limit, false);
        
        if($eLimit->status == 'success') {
            $this->params['limit'] = $eLimit->data->limit_pinjaman;
        }
        else {
            $this->params['limit'] = null;
        }

        $url_hutang = \Config::get('api_config.get_hutang');
        $hutang = Http::withToken($token)
                        ->get($url_hutang);

        $eHutang = json_decode($hutang, false);

        if($eHutang->status == 'success') {
            $this->params['hutang'] = $eHutang->data->hutang;
        }
        else {
            $this->params['hutang'] = null;
        }

        return view('borrower.dashboard', $this->params);
    }
}
