<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Core\Directory\Directory;
use CBM\Core\Response\Response;
use CBM\Core\Config\Config;
use CBM\Core\Option\Option;
use CBM\Session\Session;

// Require Autoload
require_once(ROOTPATH."/vendor/autoload.php");

// Set Response Headers
Response::header();

// Require All Config Environment Files
foreach(Directory::requires('config', 'php') as $path){
    $configs[basename($path, '.php')] = require($path);
}
// Set Config Environments
Config::set($configs);

// Get Db Connection File
require_once(__DIR__.'/Connection.php');

// Require Files
array_filter(Directory::requires('resources/requires', 'php'), function($path){
    require($path);
});
array_filter(Directory::requires('resources/custom', 'php'), function($path){
    require($path);
});

// Display Error
if(!Config::get('defaults', 'debug'))
{
    ini_set('display_errors', 1);
    ini_set('error_reporting', E_ALL);
}

// Set Session In DB or Not. Default is In DB
if(Option::dbsession() != 'yes'){
    Session::session_in_db(false);
}

// Handling Errors
set_error_handler('error_handler');
set_exception_handler('exception_handler');
register_shutdown_function('shutdown_handler');