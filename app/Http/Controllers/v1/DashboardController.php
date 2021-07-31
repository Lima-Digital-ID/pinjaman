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
