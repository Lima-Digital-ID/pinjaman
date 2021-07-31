<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PinjamanModalController extends Controller
{
    public function index()
    {
        $url_nasabah = \Config::get('api_config.get_nasabah');
        $nasabah = Http::withToken(\Session::get('token'))
                        ->get($url_nasabah);

        $eNasabah = json_decode($nasabah, false);

        if($eNasabah->status == 'success') {
            \Session::put('nama', $eNasabah->data->nama);
            \Session::put('syarat_pinmo', $eNasabah->data->kelengkapan_data);
        }
    
        $user = \Session::get('nama');

        return view('borrower.jamod.index', compact('user'));
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

            $idPinjaman =  $res->data;

            $response = Http::withToken(\Session::get('token'))
            ->get($url.'/'.$idPinjaman );

            $res = json_decode($response, false);

            if ($res->status =='success') {
                return view('borrower.jamod.detail',[
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
