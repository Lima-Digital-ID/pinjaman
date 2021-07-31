<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PinjamanCepatController extends Controller
{
    public function index()
    {
    $url = \Config::get('api_config.pinjaman');
    
        $user = \Session::get('nama');

        $limit_pinjaman = \Session::get('limit_pinjaman');

        return view('borrower.jacep.index', compact('user', 'limit_pinjaman'));
    }
    
    public function create(Request $request)
    {
        
        $url = \Config::get('api_config.pinjaman');
    
        $limit_pinjaman = \Session::get('limit_pinjaman');

        $response = Http::withToken(\Session::get('token'))
                        ->post($url,[
                            'id_jenis_pinjaman' => 2,
                            'jangka_waktu'      => $request->selected,
                            'nominal'           => $limit_pinjaman
                        ]);
        $res = json_decode($response, false);

        if ($res->status ==  'success') {
            $data =  $res->data;
            return $data;
            
            return redirect()
                        ->route('api.pinjaman.cepat.detail');
        }else{
            return back();
            return $res->message;
        }
    }

    public function detail()
    {
        
        $url = \Config::get('api_config');
        
        

        return view('borrower.jacep.detail');
    }
}
