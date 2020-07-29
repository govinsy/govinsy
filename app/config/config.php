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
    'bps_domain' => 'https://webapi.bps.go.id/v1/api/domain?',
    'bps_strategic' => 'https://webapi.bps.go.id/v1/api/list?',
    'newsapi' => 'http://newsapi.org/v2/top-headlines?country=id&category=health&',
    'covid_dayone' => 'https://api.covid19api.com/dayone/country/indonesia'
]);
define('FIELD', [
    'key' => [
        'bps_key' => 'key=' . 'ae16cc87c0398c4ab14d22fa99deed75' . '&',
        'newsapi_key' => 'apiKey=' . '6ea14b5ed1454324aa734a9db2808c19'
    ],
    'model' => [
        'indicators' => 'model=indicators&',
        'statictable' => 'model=statictable',
    ],
    'type' => [
        'all' => 'type=all&', 
        'prov' => 'type=prov&', 
        'kab' => 'type=kab&', 
        'provbykab' => 'type=provbykab&'
    ]
]);