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

        $url_limit = \Config::get('api_config.limit_pinjaman');
        $url_hutang = \Config::get('api_config.get_hutang');

        $limitPinjaman = Http::withToken($token)
                            ->get($url_limit);
        $hutang = Http::withToken($token)
                        ->get($url_hutang);

        $eLimitPinjaman = json_decode($limitPinjaman, false);
        $eHutang = json_decode($hutang, false);

        if($eLimitPinjaman->status == 'success') {
            $this->params['limit'] = $eLimitPinjaman->data->limit_pinjaman;
        }
        else {
            $this->params['limit'] = null;
        }

        if($eHutang->status == 'success') {
            $this->params['hutang'] = $eHutang->data->hutang;
        }
        else {
            $this->params['hutang'] = null;
        }

        return view('borrower.dashboard', $this->params);
    }
}
