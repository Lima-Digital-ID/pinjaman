<?php

/* Api Configuration */

$domain = 'http://192.168.7.140:8000/';
$base_url = $domain.'api/';

return [
    'domain' => $domain,
    'base_url' => $base_url,
    'login' => $base_url.'login',
    'register' => $base_url.'register',
    'limit_pinjaman' => $base_url.'get-limit-nasabah',
    'get_hutang' => $base_url.'get-saldo-hutang-nasabah',
    'jenis_pinjaman' => $base_url.'jenis-pinjaman',
    'kategori_kriteria' => $base_url.'kategori-kriteria',
    'options' => $base_url.'get-option-by-kriteria',

];