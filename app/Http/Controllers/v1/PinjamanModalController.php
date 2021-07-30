<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamanModalController extends Controller
{
    public function index()
    {
        return view('borrower.jamod.index');
    }
}
