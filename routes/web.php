<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/dashboard', function () {
    return view('borrower.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
