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

    // Limit
    'limit' =>  20,

    // Refresh
    'refresh_time'   =>  300 // 5 Minutes
];