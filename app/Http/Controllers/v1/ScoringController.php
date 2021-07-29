<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScoringController extends Controller
{
    private $params;

    public function index()
    {
        $url_kategori = \Config::get('api_config.kategori_kriteria');

        $kategori = Http::withToken('2|q7VZRXQn0XR1SOBxRIizJ3A9ZelzF8ujKtBRBgpf')
                            ->get($url_kategori);

        $eKategori = json_decode($kategori, false);

        if($eKategori->status == 'success') {
            $this->params['kategori'] = json_decode($kategori, true);
            // return $eKategori->data;
        }
        else {
            // $this->params['limit'] = null;
        }
        // return $eKategori->data;
        return view('borrower.verification.scoring.index', $this->params);
    }
}
