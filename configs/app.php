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

    // Provider
    'provider' => 'Cloud Bill Master',

    // Provider Website
    'provider_uri' => 'https://cloudbillmaster.com',

    // System Encryption Secret
    'secret' => '127fd90872add863c0f5f0729356be6973676d32bc26b079cbbe5c1e98768c2b',

    // Limit
    'limit' =>  20
];