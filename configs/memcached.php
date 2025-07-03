<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

// Memcached Config
return [
    // Driver
    'driver'    =>  'memcached',

    // Host
    'host'      =>  '127.0.0.1',

    // Port
    'port'      =>  11211,

    // Prefix
    'prefix'    =>  'cbm',

    // Password
    'password'  =>  ''
];