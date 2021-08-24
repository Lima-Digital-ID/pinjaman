<?php

/* Api Configuration */

$domain = 'http://127.0.0.1:8080/';
// $domain = 'http://demoumkm.tech/backup/';
$base_url = $domain.'api/';

return [
    'domain'                => $domain,
    'base_url'              => $base_url,
    'login'                 => $base_url.'login',
    'logout'                => $base_url.'logout',
    'register'              => $base_url.'register',
    'resend_verification'   => $base_url.'resend-verification',
    'get_provinsi'          => $base_url.'get-provinsi',
    'get_kabupaten'         => $base_url.'get-kabupaten',
    'get_kecamatan'         => $base_url.'get-kecamatan',
    'kantor_cabang'         => $base_url.'kantor-cabang',
    'bank'                  => $base_url.'bank',
    'lengkapi_data'         => $base_url.'lengkapi-data',
    'limit_pinjaman'        => $base_url.'get-limit-nasabah',
    'get_hutang'            => $base_url.'get-saldo-hutang-nasabah',
    'jenis_pinjaman'        => $base_url.'jenis-pinjaman',
    'kategori_kriteria'     => $base_url.'kategori-kriteria',
    'options'               => $base_url.'get-option-by-kriteria',
    'riwayat'               => $base_url.'pinjaman-pending',
    'detail_pinjaman'       => $base_url.'pinjaman/',
    'tagihan'               => $base_url.'pinjaman-per-nasabah',
    'get_cicilan'           => $base_url.'get-cicilan/',
    'pembayaran'            => $base_url.'pembayaran',
    'syarat_modal'          => $base_url.'data-tambahan-nasabah',
    'syarat_pinjaman_umroh' => $base_url.'syarat-pinjaman-umroh',
    'pinjaman'              => $base_url.'pinjaman',
    'nasabah'               => $base_url. 'nasabah',
    'get_nasabah'           => $base_url. 'get-nasabah',
    'update_profil'         => $base_url. 'update-profile-nasabah',
    'update_foto_profil'    => $base_url. 'update-photo-nasabah',
    'update_password'       => $base_url. 'update-password',
    'get_new_notification'  => $base_url. 'get-new-notification',
    'get_all_notification'  => $base_url. 'get-notification',
    'detail_notification'   => $base_url. 'detail-notification/',
    'read_notification'     => $base_url. 'read-notification/',
    'get_scoring'           => $base_url. 'get-scoring-per-nasabah',
    'prosess_skoring'       => $base_url. 'prosess-skoring',
    'update_notification'   => $base_url. 'update-notification-sended',
];