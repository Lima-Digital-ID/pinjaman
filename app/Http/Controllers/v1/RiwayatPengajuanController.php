<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RiwayatPengajuanController extends Controller
{
    private $params;

    public function index(Request $request)
    {
        $token = Session::get('token');

        $url = \Config::get('api_config.riwayat');

        $riwayat = Http::withToken($token)->get($url);

        $eRiwayat = json_decode($riwayat, false);

        if($eRiwayat->status == 'success') {
            $this->params['riwayat'] = json_decode($riwayat, true);
        }
        else {
            $this->params['riwayat'] = null;
        }

        return view('borrower.history.index', $this->params);
    }
    public function detail()
    {
        $token = Session::get('token');

        $url = \Config::get('api_config.riwayat');

        $riwayat = Http::withToken($token)->get($url);

        $json = json_decode($riwayat, false);

        // return $json;
        $jangka_waktu = $json->data[0]->jangka_waktu;
        $nominal = $json->data[0]->nominal;

        return view('borrower.history.detail', [
            'nominal'       => $nominal,
            'asuransi'      => $json->asuransi,
            'jangka_waktu'  => $jangka_waktu,
            'operational'   => $nominal / $jangka_waktu,
            'kode_pinjaman' => $json->data[0]->kode_pinjaman,
            'tanggal_pengajuan' => $json->data[0]->tanggal_pengajuan,
        ]);
    }
}
