<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

// add http
use Illuminate\Support\Facades\Http;

class CriteriaCategoryController extends Controller
{
    public function index()
    {
    
       // this is response json
       $CriteriaCategory = Http::withToken('13|lt7Ay2tXzLTubmSfvCl9ElvSieYonDUciSSsZqgi')
                                ->get('http://127.0.0.1:8080/api/kategori-kriteria');

        // return response
        return $CriteriaCategory;
    }
}
