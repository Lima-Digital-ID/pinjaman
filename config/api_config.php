<?php

/* Api Configuration */

$domain = 'http://localhost/';
$base_url = $domain.'api/';

return [
    'domain' => $domain,
    'base_url' => $base_url,
    'login' => $base_url.'login',
    'register' => $base_url.'register',
    'limit_pinjaman' => $base_url.'get-limit-nasabah',
    'get_hutang' => $base_url.'get-saldo-hutang-nasabah',
    
];