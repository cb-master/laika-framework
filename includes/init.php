<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

use CBM\Core\ErrorHandler\ErrorHandler;
use CBM\Core\Directory\Directory;
use CBM\Core\Config\Config;

require(__DIR__.'/../vendor/autoload.php');

// Load Configs
Config::set(Directory::files(ROOTPATH.'/configs', 'php'));

// Register Error Handler
ErrorHandler::register(Config::get('app', 'debug'));

// Autoload System Files
array_map(function($folder){
    array_map(function($file){
        require_once $file;
    }, Directory::files($folder, 'php'));
}, Directory::folders(ROOTPATH.'/system'));