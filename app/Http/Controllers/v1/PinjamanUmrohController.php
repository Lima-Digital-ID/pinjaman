<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PinjamanUmrohController extends Controller
{
    public function index()
    {      
        return view('borrower.danum.index');
    }
}
