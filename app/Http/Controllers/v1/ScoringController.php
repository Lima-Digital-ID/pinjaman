<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScoringController extends Controller
{
    private $params;

    public function index()
    {
        try {
            $token = \Session::get('token');

            $url_nasabah = \Config::get('api_config.get_nasabah');
            $nasabah = Http::withToken($token)
                            ->get($url_nasabah);

            $eNasabah = json_decode($nasabah, false);

            if($eNasabah->status == 'success') {
                \Session::put('nama', $eNasabah->data->nama);
                \Session::put('is_verified', $eNasabah->data->is_verified);
                \Session::put('score', $eNasabah->data->skor);
            }

            $url_kategori = \Config::get('api_config.kategori_kriteria');

            $kategori = Http::withToken($token)
                                ->get($url_kategori);

            $eKategori = json_decode($kategori, false);

            if($eKategori->status == 'success') {
                $this->params['kategori'] = json_decode($kategori, true);
            }
            else {
                $this->params['kategori'] = null;
            }

            $url_score = \Config::get('api_config.get_scoring');
            $http_get_score_by_Id = Http::withToken($token)
                                                ->get($url_score);

            $json_get_Score = json_decode($http_get_score_by_Id, false);

            if ($json_get_Score->status == 'success') {
                $this->params['get_score'] = json_decode($http_get_score_by_Id, true);
            }else {
                $this->params['get_score'] = null;
            }
            
            return view('borrower.verification.scoring.index', $this->params);
        }
        catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
        catch (\Illuminate\Database\QueryException $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'apa-jenis-kelamin-anda' => 'required',
            'apakah-status-pernikahan-anda-saat-ini' => 'required',
            'berapa-jumlah-tanggungan-anda-saat-ini' => 'required',
            'apa-pendidikan-tertanggung-saat-ini' => 'required',
            'berapa-usia-peminjam-saat-ini' => 'required',
            'apa-pendidikan-terakhir-anda' => 'required',
            'apa-jenis-pekerjaan-saat-ini' => 'required',
            'sudah-berapa-lama-anda-bekerja' => 'required',
            'apa-status-pekerjaan-saat-ini' => 'required',
            'apa-tujuan-pinjaman-anda' => 'required',
            'berapa-nilai-aset-yang-anda-miliki' => 'required',
            'berapa-penghasilan-gaji-yang-anda-dapatkan' => 'required',
            'berapa-pengeluaran-biaya-rumah-tangga' => 'required',
            'apakah-ada-pinjaman-di-banklembaga-keuangan-lain' => 'required',
            'bagaimana-kondisi-kredit-saat-ini' => 'required',
            'berapa-total-angsuran-banklembaga-keuangan-lain' => 'required',
        ], [
            'required' => 'Pertanyaan harus dijawab.',
        ]);

        try {
            // return $request;
            $jenisKelamin = explode('-', $request->get('apa-jenis-kelamin-anda'));
            $statusPernikahan = explode('-', $request->get('apakah-status-pernikahan-anda-saat-ini'));
            $jumlahTangguan = explode('-', $request->get('berapa-jumlah-tanggungan-anda-saat-ini'));
            $pendidikanTertanggung = explode('-', $request->get('apa-pendidikan-tertanggung-saat-ini'));
            $usiaPeminjam = explode('-', $request->get('berapa-usia-peminjam-saat-ini'));
            $pendidikanTerakhir = explode('-', $request->get('apa-pendidikan-terakhir-anda'));
            $jenisPekerjaan = explode('-', $request->get('apa-jenis-pekerjaan-saat-ini'));
            $lamaPekerjaan = explode('-', $request->get('sudah-berapa-lama-anda-bekerja'));
            $statusPekerjaan = explode('-', $request->get('apa-status-pekerjaan-saat-ini'));
            $tujuanPinjaman = explode('-', $request->get('apa-tujuan-pinjaman-anda'));
            $nilaiAset = explode('-', $request->get('berapa-nilai-aset-yang-anda-miliki'));
            $penghasilanGaji = explode('-', $request->get('berapa-penghasilan-gaji-yang-anda-dapatkan'));
            $pengeluaranBiaya = explode('-', $request->get('berapa-pengeluaran-biaya-rumah-tangga'));
            $pinjamanDiBank = explode('-', $request->get('apakah-ada-pinjaman-di-banklembaga-keuangan-lain'));
            $kondisiSlik = explode('-', $request->get('bagaimana-kondisi-kredit-saat-ini'));
            $totalAngsuran = explode('-', $request->get('berapa-total-angsuran-banklembaga-keuangan-lain'));
    
            $data = [
                $jenisKelamin[0],
                $statusPernikahan[0],
                $jumlahTangguan[0],
                $pendidikanTertanggung[0],
                $usiaPeminjam[0],
                $pendidikanTerakhir[0],
                $jenisPekerjaan[0],
                $lamaPekerjaan[0],
                $statusPekerjaan[0],
                $tujuanPinjaman[0],
                $nilaiAset[0],
                $penghasilanGaji[0],
                $pengeluaranBiaya[0],
                $pinjamanDiBank[0],
                $kondisiSlik[0],
                $totalAngsuran[0],
                '35', // DER
                '40', // ROA
                '45', // ROE
            ];

            $score = [
                $jenisKelamin[1],
                $statusPernikahan[1],
                $jumlahTangguan[1],
                $pendidikanTertanggung[1],
                $usiaPeminjam[1],
                $pendidikanTerakhir[1],
                $jenisPekerjaan[1],
                $lamaPekerjaan[1],
                $statusPekerjaan[1],
                $tujuanPinjaman[1],
                $nilaiAset[1],
                $penghasilanGaji[1],
                $pengeluaranBiaya[1],
                $pinjamanDiBank[1],
                $kondisiSlik[1],
                $totalAngsuran[1],
                '5', // DER
                '5', // ROA
                '5', // ROE
            ];

            $json = array(
                'data' => $data,
                'score' => $score
            );
            
            $url = \Config::get('api_config.prosess_skoring');

            $response = Http::withToken(\Session::get('token'))
                                ->post($url, $json);
                                
            $res = json_decode($response, false);
            $totalSkor = 0;
            if($res->status == 'success') {
                for($i=0; $i<count($score); $i++){
                    $totalSkor += $score[$i];
                }
                \Session::put('score', $totalSkor);
                return redirect()->route('dashboard')->withStatus('Berhasil mengirim data. Verifikasi membutuhkan waktu sekitar 2-3 hari.');
            }
            else {
                return back()->withError('Gagal melakukan scoring');
            }

            // return view('borrower.verification.scoring.index', $this->params);
        }
        catch (\Exception $e) {
            // return $e->getMessage();
            return back()->withError($e->getMessage());
        }
        catch (\Illuminate\Database\QueryException $e) {
            // return $e->getMessage();
            return back()->withError($e->getMessage());
        }
    }
}
