<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function index()
    {
        $url = \Config::get('api_config.pinjaman');

        $nama = \Session::get('nama');
        $limit_pinjaman = \Session::get('limit_pinjaman');

        return view('borrower.form_loan.index', compact('nama'));
    }
}
