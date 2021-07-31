<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PinjamanUmrohController extends Controller
{
    public function index()
    {     
        $url = \Config::get('api_config.pinjaman');
        
        $user = \Session::get('nama');
        
        return view('borrower.danum.index', compact('user'));
    }
    public function store(Request $request)
    {
        $url = \Config::get('api_config.pinjaman');

        $limit_pinjaman = \Session::get('limit_pinjaman');

        $response = Http::withToken(\Session::get('token'))
                        ->post($url,[
                            'nominal'     => $limit_pinjaman
                        ]);
        $res = json_decode($response, false);

        if ($res->status ==  'success') {
            $idPinjaman =  $res->data;

            return redirect()
                        ->route('api.pinjaman.cepat.detail');
        }else{
            return back()
                    ->withError($res->message);
        }
    }

    public function detail()
    {
        
    }
}
