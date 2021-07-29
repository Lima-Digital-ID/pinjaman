<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\v1\CriteriaCategory;
use App\Http\Controllers\v1\CriteriaCategoryController;

Route::get('/', function () {
    return view('welcome');
});

// example : 
// Route::get('/kategori-kriteria', function(){
    
//     $response = Http::withToken('13|lt7Ay2tXzLTubmSfvCl9ElvSieYonDUciSSsZqgi')
//                 ->get('http://127.0.0.1:8080/api/kategori-kriteria');
//     // dd($response);
//     return response($response, 200);
// });
Route::get('/kategori-kriteria', [CriteriaCategoryController::class,'index']);


Route::get('/pinjaman-cepat', function(){
    return view('borrower.jacep.index');
})->name('pinjaman.cepat');

Route::get('/pinjaman-modal', function(){
    return view('borrower.jamod.index');
})->name('pinjaman.modal');

Route::get('/pinjaman-dana-umroh', function(){
    return view('borrower.danum.index');
})->name('pinjaman.dana.umroh');

Route::get('/data-diri', function(){
    return view('borrower.verification.personalData.index');
})->name('personal.data');

Route::get('/scoring', function(){
    return view('borrower.verification.scoring.index');
})->name('scoring');

Route::get('/syarat-pinjaman-modal', function(){
    return view('borrower.loanterms.jamod.index');
})->name('syarat.jamod');

Route::get('/syarat-dana-umroh', function(){
    return view('borrower.loanterms.danum.index');
})->name('syarat.danum');

Route::get('/dashboard', function () {
    return view('borrower.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
