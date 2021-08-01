<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TagihanController extends Controller
{
    public function index()
    {
        try {
            $token = \Session::get('token');

            $url_tagihan = \Config::get('api_config.tagihan');
            $tagihan = Http::withToken($token)
                            ->get($url_tagihan);

            $response = json_decode($tagihan, false);

            if($response->status == 'success') {
                $this->params['data'] = $response->data;
                
                $this->params['asuransi'] = $response->asuransi;

                $url_cicilan = \Config::get('api_config.get_cicilan');
                $cicilan = Http::withToken($token)
                                ->get($url_cicilan.$response->data[0]->id);

                $resCicilan = json_decode($cicilan, false);

                if($resCicilan->status == 'success') {
                    $this->params['cicilan'] = $resCicilan->data;
                }
                else {
                    $this->params['cicilan'] = null;
                }
            }
            else {
                $this->params['data'] = null;
                $this->params['asuransi'] = null;
            }

            return view('borrower.tagihan.index', $this->params);
        }
        catch(\Exception $e) {
            return back()->withError($e->getMessage());
        }
        catch (\Illuminate\Database\QueryException $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function metodePembayaran(Request $request)
    {
        $this->validate($request, [
            'id_pelunasan' => 'required',
            'id_pinjaman' => 'required',
            'cicilan_ke' => 'required',
            'nominal' => 'required',
        ], [
            'required' => 'Harap pilih cicilan yang akan dibayar terlebih dahulu'
        ], [
            'id_pelunasan' => '',
            'id_pinjaman' => '',
            'cicilan_ke' => '',
            'nominal' => '',
        ]);

        try {

            $this->params['id_pelunasan'] = $request->get('id_pelunasan');
            $this->params['id_pinjaman'] = $request->get('id_pinjaman');
            $this->params['cicilan_ke'] = $request->get('cicilan_ke');
            $this->params['nominal'] = $request->get('nominal');

            return view('borrower.tagihan.metode-pembayaran', $this->params);
        }
        catch(\Exception $e) {
            return back()->withError($e->getMessage());
        }
        catch (\Illuminate\Database\QueryException $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function pembayaran(Request $request)
    {
        try {
            $token = \Session::get('token');

            $url_pembayaran = \Config::get('api_config.pembayaran');
            $pembayaran = Http::withToken($token)
                            ->post($url_pembayaran, [
                                'id' => $request->get('id_pelunasan'),
                                'id_pinjaman' => $request->get('id_pinjaman'),
                                'nominal_pembayaran' => $request->get('nominal'),
                                'metode_pembayaran' => $request->get('metode_pembayaran'),
                            ]);

            $response = json_decode($pembayaran, false);

            if($response->status == 'success') {
                // sukses membayar
                return view('borrower.tagihan.pembayaran-sukses');
            }
            else {
                // gagal membayar
                return 'gagal : '.$response->message;
            }

            return view('borrower.tagihan.index', $this->params);
        }
        catch(\Exception $e) {
            return back()->withError($e->getMessage());
        }
        catch (\Illuminate\Database\QueryException $e) {
            return back()->withError($e->getMessage());
        }
    }
}
