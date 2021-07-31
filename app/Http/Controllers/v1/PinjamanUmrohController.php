<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PinjamanUmrohController extends Controller
{

    private $params;

    public function index()
    {     
        $url = \Config::get('api_config.pinjaman');
        
        $user = \Session::get('nama');
        
        return view('borrower.danum.index', compact('user'));
    }
    public function store(Request $request)
    {
        $url = \Config::get('api_config.pinjaman');

        $response = Http::withToken(\Session::get('token'))
                        ->post($url,[
                            'id_jenis_pinjaman' => 1,
                            'jangka_waktu'      => 36,
                            'nominal'           => $request->nominal
                        ]);

        $res = json_decode($response, false);
        return $res;
        if ($res->status ==  'success') {
            $idPinjaman =  $res->data;
            
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

    public function detail()
    {
        
    }
}
