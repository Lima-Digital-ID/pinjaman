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
    public function create(Request $request)
    {
        $url = \Session::get('api_config.');
        
        $suket_travel          = base64_encode(file_get_contents($request->file('suket_travel')->path()));
        $selfie_usaha          = base64_encode(file_get_contents($request->file('selfie_usaha')->path()));
        $siup                  = base64_encode(file_get_contents($request->file('siup')->path()));
        $nib                   = base64_encode(file_get_contents($request->file('nib')->path()));
        $scan_jaminan          = base64_encode(file_get_contents($request->file('scan_jaminan')->path()));

        $response = Http::withToken()
                    ->post($url, [
                        'suket_travel' => $suket_travel,
                        'selfie_usaha' => $selfie_usaha,
                        'siup'         => $siup,
                        'nib'          => $nib,
                        'scan_jaminan' => $scan_jaminan
                    ]);
        return $response;
    }
}
