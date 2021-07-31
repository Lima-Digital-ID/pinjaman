<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PinjamanModalController extends Controller
{
    public function index()
    {
        $url = \Session::get('api_config.pinjaman_cepat');
    
        $user = \Session::get('nama');
        $limit_pinjaman = \Session::get('limit_pinjaman');

        return view('borrower.jamod.index', compact('user', 'limit_pinjaman'));
    }
    public function store(Request $request)
    {
        $url = \Config::get('api_config.pinjaman');

        $response = Http::withToken(\Session::get('token'))
                        ->post($url,[
                            'id_jenis_pinjaman' => 3,
                            'jangka_waktu'      => 36,
                            'nominal'           => $request->nominal
                        ]);
        $res = json_decode($response, false);

        if ($res->status ==  'success') {

            $response = Http::withToken(\Session::get('token'))
            ->get($url.'/'.$idPinjaman );

            $res = json_decode($response, false);

            if ($res->status =='success') {
                return view('borrower.danum.detail',[
                    'data' => $res->data,
                    'asuransi' => $res->asuransi
                    ]);    
            }else{
                return back()
                    ->withError($res->message);
            }

            return redirect()
                        ->route('api.pinjaman.cepat.detail');
        }else{
            return back()
                    ->withError($res->message);
        }
    }

}
