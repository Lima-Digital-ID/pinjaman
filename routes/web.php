<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\{CriteriaCategoryController,
                            DashboardController,
                            PinjamanCepatController,
    PinjamanController,
    PinjamanModalController,
                            PinjamanUmrohController,
                            RiwayatPengajuanController,
                            ScoringController,
                            SyaratDanaUmrohController,
                            SyaratPinjamanModalController,
                            VerificationController
};
use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Middleware\AuthStatus;
use App\Http\Middleware\AuthNoLogin;

    Route::get('/', function () {
        return view('welcome');
    });

Route::group(['middleware' => AuthNoLogin::class], function(){

    Route::get('/kategori-kriteria', [CriteriaCategoryController::class,'index']);

    /**
     * Pinjaman
     */
    Route::get('/pinjaman-cepat', [PinjamanCepatController::class, 'index'])->name('pinjaman.cepat');
    Route::post('/pinjaman-cepat', [PinjamanCepatController::class, 'create'])->name('api.pinjaman.cepat');
    Route::get('/pinjaman-cepat-detail', [PinjamanCepatController::class, 'detail'])->name('api.pinjaman.cepat.detail');

    /**
     * Pinjaman modal and dana umroh
     */
    Route::get('/pinjaman-modal', [PinjamanModalController::class, 'index'])->name('pinjaman.modal');
    Route::post('/pinjaman-modal', [PinjamanModalController::class, 'store'])->name('api.pinjaman.modal');

    Route::get('/pinjaman-umroh', [PinjamanUmrohController::class, 'index'])->name('pinjaman.umroh');
    Route::post('/pinjaman-umroh', [PinjamanUmrohController::class, 'store'])->name('api.pinjaman.umroh');
    Route::post('/pinjaman-umroh-detail', [PinjamanUmrohController::class, 'detail'])->name('api.pinjaman.umroh.detail');

    /**
     * Verifikasi
     */
    Route::get('/data-diri', [VerificationController::class, 'index'])->name('personal.data');
    Route::post('/data-diri', [VerificationController::class, 'store'])->name('personal.store-data');
    // get kabupaten by provinsi
    Route::get('/get-kabupaten', [VerificationController::class, 'getKabupaten']);
    Route::get('/get-kecamatan', [VerificationController::class, 'getKecamatan']);

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
});
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

