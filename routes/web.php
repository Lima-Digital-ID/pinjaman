<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pinjaman-cepat', function(){
    return view('borrower.jacep.index');
})->name('pinjaman.cepat');

Route::get('/dashboard', function () {
    return view('borrower.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
