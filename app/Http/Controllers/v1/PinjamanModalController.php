<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;

class PinjamanModalController extends Controller
{
    public function index()
    {
        if(\Session::get('is_verified') == 1) {
            $url_nasabah = \Config::get('api_config.get_nasabah');
            $nasabah = Http::withToken(\Session::get('token'))
                            ->get($url_nasabah);

            $eNasabah = json_decode($nasabah, false);

            if($eNasabah->status == 'success') {
                \Session::put('nama', $eNasabah->data->nama);
                \Session::put('kelengkapan_data', $eNasabah->data->kelengkapan_data);
            }
        
            $user = \Session::get('nama');

            return view('borrower.jamod.index', compact('user'));
        }
        else if(\Session::get('is_verified') == 2) {
            return back()->withError('Data anda sedang dalam proses pengecekan.');
        }
        else if(\Session::get('is_verified') == 3) {
            return back()->withError('Verifikasi data anda ditolak. Silahkan lihat alasan penolakan di notifikasi.');
        }
        else {
            return back()->withError('Harap untuk melakukan verifikasi data terlebih dahulu.');
        }
    }
    public function store(Request $request)
    {
        $url = \Config::get('api_config.pinjaman');

        $validated = $request->validate([
            'nominal' => 'required|numeric|max:5000000000'
        ],[
            'max' => ':attribute tidak boleh lebih dari Rp.5.000.000.000,00.',
            'required' => ':attribute harus diisi.'
        ], [
            'nominal' => 'Nominal',
        ]);
        
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
                    'asuransi' => $res->asuransi,
                    'nominal' => $request->nominal
                    ]);    
            }else{
                Alert::error('Informasi', $res->message)->persistent('Close');
                return back();
                // return back()
                //     ->withError($res->message);
            }

            return redirect()
                        ->route('api.pinjaman.cepat.detail');
        }else{
            Alert::error('Informasi', $res->message)->persistent('Close');
            return back();
            // return back()
            //         ->withError($res->message);
        }
    }

}
