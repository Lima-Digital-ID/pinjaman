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
    
        $token = \Session::get('token');
        $nasabah = Http::withToken($token)
                        ->get($url);

        $limit_pinjaman = \Session::get('limit_pinjaman');

        return view('borrower.jacep.index', compact('limit_pinjaman'));
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
            $idPinjaman =  $res->data;

            return redirect()
                        ->route('api.pinjaman.cepat.detail', ['id' => $idPinjaman]);
        }else{
            return back()
                    ->withError($res->message);
        }
    }

    public function detail($id)
    {
        try {
            $url = \Config::get('api_config.pinjaman');

            $response = Http::withToken(\Session::get('token'))
                                ->get($url.'/'.$id );

            $res = json_decode($response, false);

            if ($res->status =='success') {
                return view('borrower.jacep.detail',[
                    'data' => $res->data,
                    'asuransi' => $res->asuransi
                ]);
            }else{
                return back()
                        ->withError($res->message);
            }
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withError($e->getMessage());
        }
    }
}
