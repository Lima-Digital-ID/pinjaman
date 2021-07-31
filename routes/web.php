<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\{CriteriaCategoryController,
                            DashboardController,
                            PinjamanCepatController,
                            PinjamanModalController,
                            PinjamanUmrohController,
                            RiwayatPengajuanController,
                            ScoringController,
                            SyaratDanaUmrohController,
                            SyaratPinjamanModalController
};
use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Middleware\AuthStatus;

    Route::get('/', function () {
        return view('welcome');
    });


    Route::get('/kategori-kriteria', [CriteriaCategoryController::class,'index']);


    /**
     * Pinjaman
     */
    Route::get('/pinjaman-cepat', [PinjamanCepatController::class, 'index'])->name('pinjaman.cepat');

    Route::get('/pinjaman-modal', [PinjamanModalController::class, 'index'])->name('pinjaman.modal');

    Route::get('/pinjaman-umroh', [PinjamanUmrohController::class, 'index'])->name('pinjaman.umroh');

    /**
     * Verifikasi
     */
    Route::get('/data-diri', function(){
        return view('borrower.verification.personalData.index');
    })->name('personal.data');

    Route::get('/scoring', [ScoringController::class, 'index'])->name('scoring');

    /**
     * Syarat Pinjaman
     */
    Route::get('/syarat-pinjaman-modal',[SyaratPinjamanModalController::class, 'index'])->name('syarat.jamod');
    Route::post('/syarat-pinjaman-modal',[SyaratPinjamanModalController::class, 'create'])->name('api.syarat.jamod');

    Route::get('/syarat-dana-umroh', [SyaratDanaUmrohController::class, 'index'])->name('syarat.danum');

    /**
     * Kebijakan Privasi
     */
    Route::view('/kebijakan-privasi', 'borrower.kebijakanPrivasi.index')
            ->name('kebijakan.privasi');

    /**
     * Other
     */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/riwayat', [RiwayatPengajuanController::class, 'index'])->name('riwayat');

    /**
     * Authentication
     */
    Route::group(['middleware'=> AuthStatus::class], function(){
        Route::get('/daftar',[AuthController::class,'register'])->name('register');
        Route::get('/masuk', [AuthController::class,'login'])->name('login');
    });

    // Consume API
    Route::post('/register', [AuthController::class,'ApiRegister'])->name('api.register');
    Route::post('/login', [AuthController::class,'ApiLogin'])->name('api.login');
    Route::get('/logout', [AuthController::class,'ApiLogout'])->name('api.logout');

