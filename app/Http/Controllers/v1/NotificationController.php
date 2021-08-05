<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    private $params;

    public function index()
    {
        try {
            $url = \Config::get('api_config.get_all_notification');
            $notifikasi = Http::withToken(\Session::get('token'))
                            ->get($url);

            $eNotif = json_decode($notifikasi, false);

            if($eNotif->status == 'success') {
                $url_new_notif = \Config::get('api_config.get_new_notification');
                $newNotifikasi = Http::withToken(\Session::get('token'))
                                ->get($url_new_notif);

                $eNewNotif = json_decode($newNotifikasi, false);

                $url_update = \Config::get('api_config.update_notification');
                
                $json = array(
                    'data' => $eNewNotif->data,
                );

                $updateNotif = Http::withToken(\Session::get('token'))
                                ->post($url_update, $json);

                $eUpdateNotif = json_decode($updateNotif, json_encode($json));
                
                $this->params['notifikasi'] = $eNotif->data;
            }
            else {
                $this->params['notifikasi'] = null;
                return back()->withError('Terjadi kesalahan', $eNotif->message);
            }

            return view('borrower.notification.index', $this->params);
        }
        catch (\Exception $e) {
            return back()->withError('Terjadi kesalahan', $e->getMessage());
        }
    }

    public function detail($id)
    {
        try {
            $url = \Config::get('api_config.detail_notification');
            $notifikasi = Http::withToken(\Session::get('token'))
                            ->get($url.$id);

            $eNotif = json_decode($notifikasi, false);

            if($eNotif->status == 'success') {
                $url_read = \Config::get('api_config.read_notification');
                $read_notifikasi = Http::withToken(\Session::get('token'))
                                ->get($url_read.$id);

                $eReadNotif = json_decode($read_notifikasi, false);
                
                if($eReadNotif->status == 'success') {
                    $this->params['notifikasi'] = $eNotif->data[0];
                }
                else {
                    $this->params['notifikasi'] = null;
                    return back()->withError('Terjadi kesalahan', $eNotif->message);
                }
            }
            else {
                $this->params['notifikasi'] = null;
                return back()->withError('Terjadi kesalahan', $eNotif->message);
            }

            return view('borrower.notification.detail', $this->params);
        }
        catch (\Exception $e) {
            return back()->withError('Terjadi kesalahan', $e->getMessage());
        }
    }
}
