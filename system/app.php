<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || defined('CONSOLEPATH') || http_response_code(403).die('403 Forbidden Access!');

return [
    //// Return Application Constants as Array

    // App Name
    'name'  =>  'Laika',

    // Provider
    'provider'  =>  'Cloud Bill Master',

    // Provider Website
    'provider_uri'  =>  'https://cloudbillmaster.com',

    // System Encryption Method
    'encryption_method' =>  'AES-256-CBC',

    // Limit
    'limit' =>  20
];