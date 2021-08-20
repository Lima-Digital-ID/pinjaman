<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VerificationController extends Controller
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
            \Session::put('is_verified', $eNasabah->data->is_verified);
        }


        $token = Session::get('token');

        $url_provinsi = \Config::get('api_config.get_provinsi');
        $getProvinsi = Http::withToken($token)
            ->get($url_provinsi);

        $provinsi = json_decode($getProvinsi, false);

        if ($provinsi->status == 'success') {
            $this->params['provinsi'] = $provinsi->data;
        } else {
            $this->params['provinsi'] = null;
        }

        $urlKantorCabang = \Config::get('api_config.kantor_cabang');
        $getKantorCabang = Http::withToken($token)
            ->get($urlKantorCabang);

        $kantorCabang = json_decode($getKantorCabang, false);

        if ($kantorCabang->status == 'success') {
            $this->params['kantorCabang'] = $kantorCabang->data;
        } else {
            $this->params['kantorCabang'] = null;
        }

        $urlGetBank = \Config::get('api_config.bank');
        $getBank = Http::withToken($token)
            ->get($urlGetBank);

        $bank = json_decode($getBank, false);

        if ($bank->status == 'success') {
            $this->params['bank'] = $bank->data;
        } else {
            $this->params['bank'] = null;
        }

        return view('borrower.verification.personaldata.index', $this->params);
    }

    public function getKabupaten(Request $request)
    {
        $token = Session::get('token');

        $id_provinsi = $request->get('id_provinsi');

        $url_kabupaten = \Config::get('api_config.get_kabupaten');
        $getKabupaten = Http::withToken($token)
            ->get($url_kabupaten . '/' . $id_provinsi);

        $kabupaten = json_decode($getKabupaten, false);

        if ($kabupaten->status == 'success') {
            return $kabupaten->data;
        } else {
            return null;
        }

        // return view('borrower.verification.personalData.index', $this->params);
    }

    public function getKecamatan(Request $request)
    {
        $token = Session::get('token');

        $id_kabupaten = $request->get('id_kabupaten');

        $url_kecamatan = \Config::get('api_config.get_kecamatan');
        $getKecamatan = Http::withToken($token)
            ->get($url_kecamatan . '/' . $id_kabupaten);

        $kecamatan = json_decode($getKecamatan, false);

        if ($kecamatan->status == 'success') {
            return $kecamatan->data;
        } else {
            return null;
        }

        // return view('borrower.verification.personalData.index', $this->params);
    }

    public function store(Request $request)
    {
        // dd('hello');
        $validatedData = $request->validate(
            [
                'scan_ktp' => 'required',
                'selfie_ktp' => 'required',
                'nama' => 'required',
                'nik' => 'required',
                'nip' => 'required',
                'id_provinsi' => 'required',
                'id_kabupaten' => 'required',
                'kecamatan_id' => 'required',
                'id_kantor_cabang' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required',
                'nama_rekening' => 'required',
                'id_bank' => 'required',
                'no_rekening' => 'required',
                'pekerjaan' => 'required',
                'jabatan' => 'required',
                'alamat_perusahaan' => 'required',
                'kontak_perusahaan' => 'required',
                'hubungan' => 'not_in:0',
                'nama_penjamin' => 'required',
                'nik_penjamin' => 'required',
                'no_hp_penjamin' => 'required',
                'alamat_penjamin' => 'required',
                'hubungan2' => 'not_in:0',
                'nama_penjamin2' => 'required',
                'nik_penjamin2' => 'required',
                'no_hp_penjamin2' => 'required',
                'alamat_penjamin2' => 'required',
                'ibu_kandung'   => 'required'
            ],
            [
                'required' => ':attribute tidak boleh kosong.',
                'date' => ':attribute tidak valid.',
            ], 
            [
                'scan_ktp' => 'Scan KTP',
                'selfie_ktp' => 'Selfie KTP',
                'nama' => 'Nama',
                'nik' => 'NIK',
                'nip' => 'NIP',
                'id_provinsi' => 'Provinsi',
                'id_kabupaten' => 'Kabupaten',
                'kecamatan_id' => 'Kecamatan',
                'id_kantor_cabang' => 'Kantor Cabang',
                'tempat_lahir' => 'Tempat Lahir',
                'tanggal_lahir' => 'Tanggal Lahir',
                'alamat' => 'Alamat',
                'nama_rekening' => 'Nama Rekening',
                'id_bank' => 'Bank',
                'no_rekening' => 'Nomor Rekening',
                'pekerjaan' => 'Pekerjaan',
                'jabatan' => 'Jabatan',
                'alamat_perusahaan' => 'Alamat Perusahaan',
                'kontak_perusahaan' => 'Kontak Perusahaan',
                'hubungan' => 'Jenis Hubungan',
                'nama_penjamin' => 'Nama Kerabat',
                'nik_penjamin' => 'NIK Kerabat',
                'no_hp_penjamin' => 'No. Handphone Kerabat',
                'alamat_penjamin' => 'Alamat Kerabat',
                'hubungan2' => 'Jenis Hubungan',
                'nama_penjamin2' => 'Nama Kerabat',
                'nik_penjamin2' => 'NIK Kerabat',
                'no_hp_penjamin2' => 'No. Handphone Kerabat',
                'alamat_penjamin2' => 'Alamat Kerabat',
                'ibu_kandung'   => 'ibu_kandung'
            ]
        );

        $url = \Config::get('api_config.lengkapi_data');

        $token = \Session::get('token');

        $ktpFile = $request->file('scan_ktp');
        $selfieFile = $request->file('selfie_ktp');
        $ktpBase64 = base64_encode(file_get_contents($ktpFile));
        $selfieBase64 = base64_encode(file_get_contents($selfieFile));
        // return $request;
        $response = Http::withToken($token)
            ->post($url, [
                'scan_ktp' => $ktpBase64,
                'ktp_filename' => $ktpFile->getClientOriginalName(),
                'foto_dengan_ktp' => $selfieBase64,
                'with_ktp_filename' => $selfieFile->getClientOriginalName(),
                'nama' => $request->get('nama'),
                'nik' => $request->get('nik'),
                'nip' => $request->get('nip'),
                'kecamatan_id' => $request->get('kecamatan_id'),
                'id_kantor_cabang' => $request->get('id_kantor_cabang'),
                'tempat_lahir' => $request->get('tempat_lahir'),
                'tgl_lahir' => $request->get('tanggal_lahir'),
                'alamat' => $request->get('alamat'),
                'nama_akun_bank' => $request->get('nama_rekening'),
                'id_bank' => $request->get('id_bank'),
                'norek' => $request->get('no_rekening'),
                'pekerjaan' => $request->get('pekerjaan'),
                'jabatan' => $request->get('jabatan'),
                'alamat_perusahaan' => $request->get('alamat_penjamin'),
                'kontak_perusahaan' => $request->get('kontak_perusahaan'),
                'hubungan' => $request->get('hubungan'),
                'nama_penjamin' => $request->get('nama_penjamin'),
                'nik_penjamin' => $request->get('nik_penjamin'),
                'no_hp_penjamin' => $request->get('no_hp_penjamin'),
                'alamat_penjamin' => $request->get('alamat_penjamin'),
                'hubungan2' => $request->get('hubungan2'),
                'nama_penjamin2' => $request->get('nama_penjamin2'),
                'nik_penjamin2' => $request->get('nik_penjamin2'),
                'no_hp_penjamin2' => $request->get('no_hp_penjamin2'),
                'alamat_penjamin2' => $request->get('alamat_penjamin2'),
                'hubungan3' => $request->get('hubungan3'),
                'nama_penjamin3' => $request->get('nama_penjamin3'),
                'nik_penjamin3' => $request->get('nik_penjamin3'),
                'no_hp_penjamin3' => $request->get('no_hp_penjamin3'),
                'alamat_penjamin3' => $request->get('alamat_penjamin3'),
                'ibu_kandung' => $request->get('ibu_kandung'),
            ]);
        $res = json_decode($response, false);
        if($res->message == "Success update data") {
            \Session::put('is_verified', 2);
            // return back()->withStatus('Berhasil mengirim data. Verifikasi membutuhkan waktu sekitar 2-3 hari.');
            return redirect()->route('scoring');
        }
        else {
            return back()->withError('Gagal mengirim data.');
        }

        return $response;
    }
}
