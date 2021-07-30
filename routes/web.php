<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\{CriteriaCategoryController,
                            DashboardController,
                            RiwayatPengajuanController,
                            ScoringController
                        };
use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Middleware\AuthStatus;
use GuzzleHttp\Middleware;

Route::get('/', function () {
    return view('welcome');
});


    Route::get('/kategori-kriteria', [CriteriaCategoryController::class,'index']);

    Route::get('/pinjaman-cepat', function(){
        return view('borrower.jacep.index');
    })->name('pinjaman.cepat');

    Route::get('/pinjaman-modal', function(){
        return view('borrower.jamod.index');
    })->name('pinjaman.modal');

    Route::get('/pinjaman-umroh', function(){
        return view('borrower.danum.index');
    })->name('pinjaman.umroh');

    Route::get('/data-diri', function(){
        return view('borrower.verification.personalData.index');
    })->name('personal.data');

    Route::get('/scoring', [ScoringController::class, 'index'])->name('scoring');

    Route::get('/syarat-pinjaman-modal', function(){
        return view('borrower.loanterms.jamod.index');
    })->name('syarat.jamod');

    Route::get('/syarat-dana-umroh', function(){
        return view('borrower.loanterms.danum.index');
    })->name('syarat.danum');

    Route::get('/kebijakan-privasi', function(){
        return view('borrower.kebijakanPrivasi.index');
    })->name('kebijakan.privasi');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/riwayat', [RiwayatPengajuanController::class, 'index'])->name('riwayat');

    Route::group(['middleware'=> AuthStatus::class], function(){
        Route::get('/daftar',[AuthController::class,'register'])->name('register');
        Route::get('/masuk', [AuthController::class,'login'])->name('login');
    });

// Consume API
Route::post('/register', [AuthController::class,'ApiRegister'])->name('api.register');
Route::post('/login', [AuthController::class,'ApiLogin'])->name('api.login');
Route::get('/logout', [AuthController::class,'ApiLogout'])->name('api.logout');

