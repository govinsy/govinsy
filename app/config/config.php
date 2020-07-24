<?php 

// Alamat utama
define('BASEURL', 'http://localhost/govinsy/public');

// Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'govinsy');

// Deklarasi Paramater API
define('URL', [
    'covid_ind' => 'https://covid19.mathdro.id/api/countries/IDN',
    'covid_prov' => 'https://data.covid19.go.id/public/api/prov.json',
    'bps_domain' => 'https://webapi.bps.go.id/v1/api/domain?'
]);
define('FIELD', [
    'key' => [
        'bps_key' => 'key=' . 'ae16cc87c0398c4ab14d22fa99deed75' . '&'
    ],
    'type' => [
        'all' => 'type=all&', 
        'prov' => 'type=prov&', 
        'kab' => 'type=kab&', 
        'provbykab' => 'type=provbykab&'
    ]
]);