<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isNan;

class DashboardController extends Controller
{
    private $params;

    public function index()
    {
        $url_limit = \Config::get('api_config.limit_pinjaman');
        $url_hutang = \Config::get('api_config.get_hutang');

        $limitPinjaman = Http::withToken('2|q7VZRXQn0XR1SOBxRIizJ3A9ZelzF8ujKtBRBgpf')
                            ->get($url_limit);
        $hutang = Http::withToken('2|q7VZRXQn0XR1SOBxRIizJ3A9ZelzF8ujKtBRBgpf')
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
            $this->params['hutang'] = isNan();
        }

        return view('borrower.dashboard', $this->params);
    }
}
