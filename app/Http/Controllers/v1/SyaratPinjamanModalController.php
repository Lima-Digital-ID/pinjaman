<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SyaratPinjamanModalController extends Controller
{
    public function index()
    {
        return view('borrower.loanterms.jamod.index');
    }
    public function create(Request $request)
    {

        try {
        $url = \Config::get('api_config.syarat_modal');
        $token = \Session::get('token');

        $kartu_keluarga     = base64_encode(file_get_contents($request->file('kartu_keluarga')));
        $scan_npwp          = base64_encode(file_get_contents($request->file('scan_npwp')));
        $ktp_suami          = base64_encode(file_get_contents($request->file('ktp_suami')));
        $ktp_istri          = base64_encode(file_get_contents($request->file('ktp_istri')));
        $surat_nikah        = base64_encode(file_get_contents($request->file('surat_nikah')));
        $bpkb               = base64_encode(file_get_contents($request->file('bpkb')));
        $domisili_usaha     = base64_encode(file_get_contents($request->file('domisili_usaha')));
        $npwp_usaha         = base64_encode(file_get_contents($request->file('npwp_usaha')));
        $nib                = base64_encode(file_get_contents($request->file('nib')));
        $akta               = base64_encode(file_get_contents($request->file('akta')));
        $scan_jaminan       = base64_encode(file_get_contents($request->file('scan_jaminan')));
        $keuangan           = base64_encode(file_get_contents($request->file('keuangan')));

        $response = Http::withToken($token)->post($url, [
            'tempat_tinggal'    => $request->tempat_tinggal,
            'scan_npwp'         => $scan_npwp,
            'kartu_keluarga'    => $kartu_keluarga,
            'ktp_suami'         => $ktp_suami,
            'ktp_istri'         => $ktp_istri,
            'surat_nikah'       => $surat_nikah,
            'bpkb'              => $bpkb,
            'domisili_usaha'    => $domisili_usaha,
            'npwp_usaha'        => $npwp_usaha,
            'nib'               => $nib,
            'akta'              => $akta,
            'jaminan'           => $scan_jaminan,
            'keuangan'          => $keuangan,
            
            'kartu_keluarga_filename'    => $request->file('kartu_keluarga')->getClientOriginalName(),
            'npwp_filename'              => $request->file('scan_npwp')->getClientOriginalName(),
            'ktp_suami_filename'         => $request->file('ktp_suami')->getClientOriginalName(),
            'ktp_istri_filename'         => $request->file('ktp_istri')->getClientOriginalName(),
            'surat_nikah_filename'       => $request->file('surat_nikah')->getClientOriginalName(),
            'bpkb_filename'              => $request->file('bpkb')->getClientOriginalName(),
            'domisili_usaha_filename'    => $request->file('domisili_usaha')->getClientOriginalName(),
            'npwp_usaha_filename'        => $request->file('npwp_usaha')->getClientOriginalName(),
            'nib_filename'               => $request->file('nib')->getClientOriginalName(),
            'akta_filename'              => $request->file('akta')->getClientOriginalName(),
            'jaminan_filename'           => $request->file('scan_jaminan')->getClientOriginalName(),
            'keuangan_filename'          => $request->file('keuangan')->getClientOriginalName()
        ]);

        $res = json_decode($response, false);

            if ($res->status ==  'success') {
                \Session::put('kelengkapan_data', 2);
                return back()
                            ->withStatus('Berhasil mengirim persyaratan, silahkan tunggu konfirmasi dari admin.');
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
