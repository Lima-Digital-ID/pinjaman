<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SyaratPinjamanModalController extends Controller
{
    public function index()
    {
        return view('borrower.loanterms.jamod.index');
    }
}
