<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

// Redis Config

return [
    // Driver
    'driver'    =>  'redis',
    
    // Host
    'host'      =>  '127.0.0.1',

    // Port
    'port'      =>  6379,

    // Prefix
    // 'prefix'    =>  'cbm', // Comment out if custom prefix required
    
    // Password
    // 'password'  =>  '' // Comment out if password authentication required
];