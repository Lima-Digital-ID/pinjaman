<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    private $params;

    public function index()
    {
        $token = Session::get('token');

        $url_nasabah = \Config::get('api_config.get_nasabah');
        $nasabah = Http::withToken($token)
                        ->get($url_nasabah);

        $eNasabah = json_decode($nasabah, false);

        if($eNasabah->status == 'success') {
            Session::put('is_verified', $eNasabah->data->is_verified);
        }

        $url_limit = \Config::get('api_config.limit_pinjaman');
        $limit = Http::withToken($token)
                        ->get($url_limit);

        $eLimit = json_decode($limit, false);

        if($eLimit->status == 'success') {
            $this->params['limit'] = $eLimit->data->limit_pinjaman;
            $this->params['temp_limit'] = $eNasabah->data->temp_limit;
            $this->params['is_verified'] = $eNasabah->data->is_verified;
            $this->params['kelengkapan_data'] = $eNasabah->data->kelengkapan_data;
            $this->params['syarat_umroh'] = $eNasabah->data->syarat_pinjaman_umroh;
            $this->params['sisa_pinjaman'] = $eNasabah->data->hutang;
            Session::put('is_verified', $eNasabah->data->is_verified);
            Session::put('score', $eNasabah->data->skor);
            Session::put('syarat_pinjaman_umroh', $eNasabah->data->syarat_pinjaman_umroh);
            Session::put('kelengkapan_data', $eNasabah->data->kelengkapan_data);
        }
        else {
            $this->params['limit'] = null;
        }

        $url_hutang = \Config::get('api_config.get_hutang');
        $hutang = Http::withToken($token)
                        ->get($url_hutang);

        $eHutang = json_decode($hutang, false);

        if($eHutang->status == 'success') {
            $this->params['hutang'] = $eHutang->data->hutang;
        }
        else {
            $this->params['hutang'] = null;
        }

        $url = \Config::get('api_config.riwayat');

        $riwayat = Http::withToken($token)->get($url);

        $eRiwayat = json_decode($riwayat, false);

        if($eRiwayat->status == 'success') {
            $this->params['riwayat'] = json_decode($riwayat, true);
        }
        else {
            $this->params['riwayat'] = null;
        }

        $url = \Config::get('api_config.riwayat');

        $riwayat = Http::withToken($token)->get($url);

        $json = json_decode($riwayat, false);

        $jangka_waktu = $json->data[0]->jangka_waktu;
        $nominal = $json->data[0]->nominal;


        $this->params['jangka_waktu'] = $jangka_waktu;
        $this->params['nominal']      = $nominal;
        $this->params['asuransi']      = $json->asuransi;
        $this->params['operational']   = $nominal / $jangka_waktu;
        $this->params['kode_pinjaman'] = $json->data[0]->kode_pinjaman;
        $this->params['tanggal_pengajuan'] = $json->data[0]->tanggal_pengajuan;

        return view('borrower.dashboard', $this->params);
    }

    public function profile()
    {
        try {
            $token = Session::get('token');

            $url_nasabah = \Config::get('api_config.get_nasabah');
            $nasabah = Http::withToken($token)
                            ->get($url_nasabah);

            $eNasabah = json_decode($nasabah, false);

            if($eNasabah->status == 'success') {
                $this->params['data'] = $eNasabah->data;

                Session::put('nama', $eNasabah->data->nama);
                Session::put('tanggal_lahir', $eNasabah->data->tanggal_lahir);
                Session::put('tempat_lahir', $eNasabah->data->tempat_lahir);
                Session::put('alamat', $eNasabah->data->alamat);
                Session::put('foto_profil', $eNasabah->data->foto_profil);
            }
            else {
                $this->params['data'] = null;
            }

            return view('auth.profile', $this->params);
        }
        catch(\Exception $e) {
            return back()->withError($e->getMessage());
        }
        catch (\Illuminate\Database\QueryException $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
        ], [
            'required' => ':attribute harus diisi',
        ], [
            'nama' => 'Nama lengkap',
            'tanggal_lahir' => 'Tanggal lahir',
            'tempat_lahir' => 'Tempat lahir',
            'alamat' => 'Alamat'
        ]);
        try {
            $token = Session::get('token');

            $foto = $request->file('foto_profile');

            if($foto != null || $foto != '') {
                $fotoBase64 = base64_encode(file_get_contents($foto));

                $url_profil = \Config::get('api_config.update_foto_profil');
                $resfoto = Http::withToken($token)
                                ->post($url_profil, [
                                    'foto_profil' => $fotoBase64,
                                    'foto_profil_filename' => $foto->getClientOriginalName(),
                                ]);

                $responseFoto = json_decode($resfoto, false);
            }

            $url_profil = \Config::get('api_config.update_profil');
            $profile = Http::withToken($token)
                            ->post($url_profil, [
                                'nama' => $request->get('nama'),
                                'tgl_lahir' => $request->get('tanggal_lahir'),
                                'tempat_lahir' => $request->get('tempat_lahir'),
                                'alamat' => $request->get('alamat'),
                            ]);

            $response = json_decode($profile, false);

            if($response->status == 'success') {
                $this->params['data'] = $response->data;
                
                return redirect()->route('edit.profile');
            }
            else {
                $this->params['data'] = null;
            }

            return view('auth.profile', $this->params);
        }
        catch(\Exception $e) {
            return back()->withError($e->getMessage());
        }
        catch (\Illuminate\Database\QueryException $e) {
            return back()->withError($e->getMessage());
        }
    }
}
