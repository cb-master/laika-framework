<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

return [
    // App Name
    'appname'   => 'Laika MVC Framework',

    // App Info
    'info'     => [
        'version'   => '1.0.0',
        'author'    => [
            'name'  => 'Showket Ahmed',
            'email' => 'riyadhtayf@gmail.com'
        ]
    ],

    // Debug Mode
    'debug'     => true,

    // Encryption Method
    'enc-method' => 'AES-256-CBC',

    // Secret Key
    'secret'    => 'laika_secret_key',
];