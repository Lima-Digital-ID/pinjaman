<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamanCepatController extends Controller
{
    public function index()
    {
        return view('borrower.jacep.index');
    }
}
