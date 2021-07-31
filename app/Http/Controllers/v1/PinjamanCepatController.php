<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PinjamanCepatController extends Controller
{
    public function index()
    {
        $url = \Session::get('api_config.pinjaman_cepat');
    
        $user = \Session::get('nama');

        $limit_pinjaman = \Session::get('limit_pinjaman');

        return view('borrower.jacep.index', compact('user', 'limit_pinjaman'));
    }
    
    public function post(Request $request)
    {

    }
}
