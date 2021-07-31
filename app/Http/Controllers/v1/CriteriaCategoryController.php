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
       $CriteriaCategory = Http::withToken('6|iFaXuhMwLGPok4GF2P5FjpLE4ELWALHK9RILsZp6')
                                ->get('http://127.0.0.1:666/api/kategori-kriteria');

        // return response
        return $CriteriaCategory;
    }
}
