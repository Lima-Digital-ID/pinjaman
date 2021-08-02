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

            $url_nasabah = \Config::get('api_config.get_nasabah');
            $nasabah = Http::withToken(\Session::get('token'))
                            ->get($url_nasabah);

            $eNasabah = json_decode($nasabah, false);

            if($eNasabah->status == 'success') {
                \Session::put('nama', $eNasabah->data->nama);
                \Session::put('is_verified', $eNasabah->data->is_verified);
            }

            $url_kategori = \Config::get('api_config.kategori_kriteria');

            $kategori = Http::withToken(\Session::get('token'))
                                ->get($url_kategori);

            $eKategori = json_decode($kategori, false);

            if($eKategori->status == 'success') {
                $this->params['kategori'] = json_decode($kategori, true);
            }
            else {
                $this->params['kategori'] = null;
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
        // $this->validate($request, [
        //     'jenis-kelamin' => 'required',
        //     'status-pernikahan' => 'required',
        //     'jumlah-tanggungan' => 'required',
        //     'pendidikan-tertanggung' => 'required',
        //     'usia-peminjam' => 'required',
        //     'pendidikan-terakhir-peminjam' => 'required',
        //     'jenis-pekerjaan' => 'required',
        //     'lama-bekerja' => 'required',
        //     'status-pekerjaan' => 'required',
        //     'tujuan-pinjaman' => 'required',
        //     'nilai-aset' => 'required',
        //     'penghasilan-gaji' => 'required',
        //     'pengeluaran-biaya-rumah-tangga' => 'required',
        //     'pinjaman-di-banklembaga-keuangan-lain' => 'required',
        //     'kondisi-slik' => 'required',
        //     'total-angsuran-banklembaga-keuangan-lain' => 'required',
        // ]);

        try {
            // return $request;
            $jenisKelamin = explode('-', $request->get('jenis-kelamin'));
            $statusPernikahan = explode('-', $request->get('status-pernikahan'));
            $jumlahTangguan = explode('-', $request->get('jumlah-tanggungan'));
            $pendidikanTertanggung = explode('-', $request->get('pendidikan-tertanggung'));
            $usiaPeminjam = explode('-', $request->get('usia-peminjam'));
            $pendidikanTerakhir = explode('-', $request->get('pendidikan-terakhir-peminjam'));
            $jenisPekerjaan = explode('-', $request->get('jenis-pekerjaan'));
            $lamaPekerjaan = explode('-', $request->get('lama-bekerja'));
            $statusPekerjaan = explode('-', $request->get('status-pekerjaan'));
            $tujuanPinjaman = explode('-', $request->get('tujuan-pinjaman'));
            $nilaiAset = explode('-', $request->get('nilai-aset'));
            $penghasilanGaji = explode('-', $request->get('penghasilan-gaji'));
            $pengeluaranBiaya = explode('-', $request->get('pengeluaran-biaya-rumah-tangga'));
            $pinjamanDiBank = explode('-', $request->get('pinjaman-di-banklembaga-keuangan-lain'));
            $kondisiSlik = explode('-', $request->get('kondisi-slik'));
            $totalAngsuran = explode('-', $request->get('total-angsuran-banklembaga-keuangan-lain'));
    
            $url_kategori = \Config::get('api_config.kategori_kriteria');

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
                35, // DER
                40, // ROA
                45, // ROE
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
                5, // DER
                5, // ROA
                5, // ROE
            ];

            $json = array(
                'data' => $data,
                'score' => $score
            );
            
            $url = \Config::get('api_config.proses_skoring');

            $response = Http::withToken(\Session::get('token'))
                                ->post($url, $json);
                                
            $res = json_decode($response, false);

            if($res->status == 'success') {
                return back()->withStatus('Berhasil');
            }
            else {
                return back()->withError('Gagal');
            }

            // return view('borrower.verification.scoring.index', $this->params);
        }
        catch (\Exception $e) {
            return $e->getMessage();
            return back()->withError($e->getMessage());
        }
        catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
            return back()->withError($e->getMessage());
        }
    }
}
