<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class SyaratDanaUmrohController extends Controller
{
    public function index()
    {
        return view('borrower.loanterms.danum.index');
    }
    public function store(Request $request)
    {
        try {
            $url = \Config::get('api_config.syarat_pinjaman_umroh');
            
            $suket_travelBase64 = base64_encode(file_get_contents($request->file('suket')));
            $selfie_usahaBase64 = base64_encode(file_get_contents($request->file('selfie')));
            $siupBase64 = base64_encode(file_get_contents($request->file('siup')));
            $nibBase64 = base64_encode(file_get_contents($request->file('nib')));
            $scan_jaminanBase64 = base64_encode(file_get_contents($request->file('jaminan')));
            $npwpBase64 = base64_encode(file_get_contents($request->file('npwp')));
            $aktaBase64 = base64_encode(file_get_contents($request->file('akta')));
            $domisiliBase64 = base64_encode(file_get_contents($request->file('domisili')));
            $keuanganBase64 = base64_encode(file_get_contents($request->file('keuangan')));

            $response = Http::withToken(\Session::get('token'))
                        ->post($url, [
                            'suket_travel_filename'     => $request->file('suket')->getClientOriginalName(),
                            'selfie_usaha_filename'     => $request->file('selfie')->getClientOriginalName(),
                            'siup_filename'             => $request->file('siup')->getClientOriginalName(),
                            'nib_filename'              => $request->file('nib')->getClientOriginalName(),
                            'scan_jaminan_filename'     => $request->file('jaminan')->getClientOriginalName(),
                            'npwp_usaha_filename'       => $request->file('npwp')->getClientOriginalName(),
                            'akta_filename'             => $request->file('akta')->getClientOriginalName(),
                            'surat_domisili_filename'   => $request->file('domisili')->getClientOriginalName(),
                            'keuangan_filename'         => $request->file('keuangan')->getClientOriginalName(),
                            'suket_travel'              => $suket_travelBase64,
                            'selfie_usaha'              => $selfie_usahaBase64,
                            'siup'                      => $siupBase64,
                            'nib'                       => $nibBase64,
                            'scan_jaminan'              => $scan_jaminanBase64,
                            'npwp_usaha'                => $npwpBase64,
                            'akta'                      => $aktaBase64,
                            'surat_domisili'            => $domisiliBase64,
                            'keuangan'                  => $keuanganBase64,
                        ]);

            $res = json_decode($response, false);

            if ($res->status ==  'success') {
                \Session::put('syarat_pinjaman_umroh', 2);
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
