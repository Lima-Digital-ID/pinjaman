<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Midtrans\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Midtrans\Snap;
use Illuminate\Support\Facades\Auth;

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
            if(count($response->data) > 0){
                $idNasabah = $response->data[0]->id_nasabah;
                if($response->status == 'success') {
                    $this->params['data'] = $response->data;
                    
                    $this->params['asuransi'] = $response->asuransi;
    
                    $url_cicilan = \Config::get('api_config.get_cicilan');
                    $cicilan = Http::withToken($token)
                                    ->get($url_cicilan.$response->data[0]->id);
    
                    $resCicilan = json_decode($cicilan, false);
                    $kodePelunasan = '';
                    // return $resCicilan;
                    if($resCicilan->status == 'success') {
                        for ($i=0; $i < count($resCicilan->data); $i++) { 
                            if($resCicilan->data[$i]->status == 'Belum') {
                                $kodePelunasan = $resCicilan->data[$i]->kode_pelunasan.'-'.$idNasabah;
                                break;
                            }
                            // echo $resCicilan->data[$i]->status.'<br>';
                        }
                    }
                    // return $kodePelunasan;
                    
                    Config::$serverKey = 'SB-Mid-server-PPVxA0uMYzPO8ii9Bivp7mJ-';
                    Config::$isSanitized = Config::$is3ds = true;
    
                    $transaction_details = [
                        'order_id' => $kodePelunasan,
                        'gross_amount' => $resCicilan->data[0]->nominal_pembayaran,
                    ];
    
                    // Optional
                    $customer_details = array(
                        'first_name'    => \Session::get('nama'),
                        'email'         => \Session::get('email'),
                        'phone'         => \Session::get('no_hp'),
                    );       
    
                    $transaction = array(
                        'customer_details' => $customer_details,
                        'transaction_details' => $transaction_details,
                    );
    
                    $snapToken = Snap::getSnapToken($transaction);
    
    
                    if($resCicilan->status == 'success') {
                        $this->params['cicilan'] = $resCicilan->data;
                        $this->params['snapToken'] = $snapToken;
                    }
                    else {
                        $this->params['cicilan'] = null;
                    }
                }
                else {
                    $this->params['data'] = null;
                    $this->params['asuransi'] = null;
                }
            }else {
                return back()->withError('Belum ada tagihan.');
            }            

            // dd($this->params['asuransi']);
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
