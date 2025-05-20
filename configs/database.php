<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

return [
    // Driver
    'driver' => 'mysql',
    // Host
    'host' => 'localhost',
    // Port
    'port' => 3306,
    // Database Name
    'dbname' => 'your_database_name',
    // Username
    'username' => 'root',
    // Password
    'password' => ''
];