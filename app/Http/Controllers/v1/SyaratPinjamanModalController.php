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

        $scan_npwp          = base64_encode(file_get_contents($request->file('scan_npwp')->path()));
        $ktp_suami          = base64_encode(file_get_contents($request->file('ktp_suami')->path()));
        $ktp_istri          = base64_encode(file_get_contents($request->file('ktp_istri')->path()));
        $surat_nikah        = base64_encode(file_get_contents($request->file('surat_nikah')->path()));
        $bpkb               = base64_encode(file_get_contents($request->file('bpkb')->path()));
        $domisili_usaha     = base64_encode(file_get_contents($request->file('domisili_usaha')->path()));
        $nib                = base64_encode(file_get_contents($request->file('nib')->path()));
        $akta               = base64_encode(file_get_contents($request->file('akta')->path()));
        $scan_jaminan       = base64_encode(file_get_contents($request->file('scan_jaminan')->path()));

        $response = Http::withToken($token)->post($url, [
            'tempat_tinggal'    => $request->tempat_tinggal,
            'scan_npwp'         => $scan_npwp,
            'ktp_suami'         => $ktp_suami,
            'ktp_istri'         => $ktp_istri,
            'surat_nikah'       => $surat_nikah,
            'bpkb'              => $bpkb,
            'domisili_usaha'    => $domisili_usaha,
            'foto_agunan'       => $request->foto_agunan,
            'npwp_usaha'        => $request->npwp_usaha,
            'nib'               => $nib,
            'akta'              => $akta,
            'notaris'           => $request->notaris,
            'scan_jaminan'      => $scan_jaminan
        ]);

        return $response;

        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withError($e->getMessage());
        }
    }
}
