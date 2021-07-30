<?php

/* Api Configuration */

$domain = 'http://127.0.0.1:8080/';
// $domain = 'http://demoumkm.tech/backup/';
$base_url = $domain.'api/';

return [
    'domain' => $domain,
    'base_url' => $base_url,
    'login' => $base_url.'login',
    'logout' => $base_url.'logout',
    'register' => $base_url.'register',
    'limit_pinjaman' => $base_url.'get-limit-nasabah',
    'get_hutang' => $base_url.'get-saldo-hutang-nasabah',
    'jenis_pinjaman' => $base_url.'jenis-pinjaman',
    'kategori_kriteria' => $base_url.'kategori-kriteria',
    'options' => $base_url.'get-option-by-kriteria',
    'riwayat' => $base_url.'pinjaman-pending',
];