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
                            VerificationController,
                            TagihanController,
                            NotificationController
};
use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Middleware\AuthStatus;
use App\Http\Middleware\AuthNoLogin;

    Route::get('/', function () {
        return view('auth.login');
    });

Route::group(['middleware' => AuthNoLogin::class], function(){

    /**
     * Tagihan
     */
    Route::get('/notifikasi', [NotificationController::class,'index'])->name('notifikasi');
    Route::get('/detail-notifikasi/{id}', [NotificationController::class,'detail'])->name('detail-notifikasi');
    /**
     * END Tagihan
     */

    /**
     * Tagihan
     */
    Route::get('/tagihan', [TagihanController::class,'index'])->name('tagihan');
    Route::post('/metode-pembayaran', [TagihanController::class,'metodePembayaran'])->name('metode-pembayaran');
    Route::post('/pembayaran', [TagihanController::class,'pembayaran'])->name('pembayaran');
    /**
     * END Tagihan
     */

    /**
     * Scoring
     */
    Route::get('/kategori-kriteria', [CriteriaCategoryController::class,'index']);
    Route::post('/proses-skoring', [ScoringController::class,'store'])->name('proses-skoring');
    /**
     * END Scoring
     */

    /**
     * Pinjaman
     */
    Route::get('/pinjaman-cepat', [PinjamanCepatController::class, 'index'])->name('pinjaman.cepat');
    Route::post('/pinjaman-cepat', [PinjamanCepatController::class, 'create'])->name('api.pinjaman.cepat');
    Route::get('/pinjaman-cepat-detail/{id}', [PinjamanCepatController::class, 'detail'])->name('api.pinjaman.cepat.detail');

    /**
     * Pinjaman modal and dana umroh
     */
    Route::get('/pinjaman-modal', [PinjamanModalController::class, 'index'])->name('pinjaman.modal');
    Route::post('/pinjaman-modal', [PinjamanModalController::class, 'store'])->name('api.pinjaman.modal');
    Route::get('/pinjaman-modal-detail', function(){
        return view('borrower.jamod.detail');
    });
    Route::get('/pinjaman-umroh', [PinjamanUmrohController::class, 'index'])->name('pinjaman.umroh');
    Route::post('/pinjaman-umroh', [PinjamanUmrohController::class, 'store'])->name('api.pinjaman.umroh');
    Route::get('/pinjaman-umroh-detail', function() {
        return view('borrower.danum.detail');
    });
    // Route::get('/pinjaman-umroh-detail', [PinjamanUmrohController::class, 'detail'])->name('api.pinjaman.umroh.detail');

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
    Route::post('/syarat-dana-umroh', [SyaratDanaUmrohController::class, 'store'])->name('api.syarat.danum');

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
    Route::get('/riwayat-detail/{id}', [RiwayatPengajuanController::class, 'detail'])->name('api.riwayat.detail');
    // Route::get('/profile', [AuthController::class, 'edit'])->name('edit.profile');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('edit.profile');
    Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('update.profile');

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

