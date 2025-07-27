<?php

return [
    /*
    |--------------------------------------------------------------------------
    | cURL Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration options for cURL requests.
    | These settings are particularly useful for development environments
    | where SSL certificate verification might need to be disabled.
    |
    */

    'verify_ssl' => env('CURL_VERIFY_SSL', 'true') !== 'false',
    
    'timeout' => env('CURL_TIMEOUT', 30),
    
    'connect_timeout' => env('CURL_CONNECT_TIMEOUT', 10),
];