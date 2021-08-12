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
        $url_nasabah = \Config::get('api_config.get_nasabah');
        $nasabah = Http::withToken(\Session::get('token'))
                        ->get($url_nasabah);

        $eNasabah = json_decode($nasabah, false);

        if($eNasabah->status == 'success') {
            \Session::put('nama', $eNasabah->data->nama);
            \Session::put('syarat_pinjaman_umroh', $eNasabah->data->syarat_pinjaman_umroh);
        }

        $user = \Session::get('nama');
        
        return view('borrower.danum.index', compact('user'));
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nominal' => 'required|numeric|max:50000000'
        ],[
            'max' => ':attribute tidak boleh lebih dari Rp.50.000.000,00.',
            'required' => ':attribute harus diisi.'
        ], [
            'nominal' => 'Nominal',
        ]);

        $url = \Config::get('api_config.pinjaman');

        $response = Http::withToken(\Session::get('token'))
                        ->post($url,[
                            'id_jenis_pinjaman' => 1,
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
                return view('borrower.danum.detail',[
                    'data' => $res->data,
                    'asuransi' => $res->asuransi,
                    'nominal' => $request->nominal,
                ]);    
            }else{
                return back()
                        ->withError($res->message);
            }

            // return redirect()
            //             ->route('api.pinjaman.cepat.detail');
        }else{
            return back()
                    ->withError($res->message);
        }
    }

    public function detail()
    {
        
    }
}
