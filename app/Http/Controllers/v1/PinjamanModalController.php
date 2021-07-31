<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamanModalController extends Controller
{
    public function index()
    {
        $url = \Session::get('api_config.pinjaman_cepat');
    
        $user = \Session::get('nama');
        $limit_pinjaman = \Session::get('limit_pinjaman');

        return view('borrower.jamod.index', compact('user', 'limit_pinjaman'));
    }
}
