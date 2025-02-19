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
use \CBM\Handler\Error\Error;
use CBM\Core\Config\Config;
use CBM\Core\Option\Option;
use CBM\Session\Session;
use CBM\Core\Date\Date;

// Require Config
require_once(__DIR__."/../config.php");
// Require Autoload
require_once(__DIR__."/../vendor/autoload.php");

// Require All Config Environment Files
foreach(Directory::files('system', 'php') as $path){
    $configs[basename($path, '.php')] = require($path);
}
// Set Config Environments
Config::set($configs);
unset($GLOBALS['configs']);

// Display Errors
ini_set('display_errors', 0);
ini_set('error_reporting', 0);
Error::$display = false;
if(Config::get('app', 'debug'))
{
    Error::$display = true;
    ini_set('display_errors', 1);
    ini_set('error_reporting', E_ALL);
}
// Log Errors
ini_set("log_errors", true);
$log_file = ROOTPATH.'/error.log';
if(!file_exists($log_file)){
    file_put_contents($log_file, '');
}
ini_set('error_log', $log_file);

// Set Session In DB or Not. Default is In DB
if(Option::dbsession() != 'yes'){
    Session::session_in_db(false);
}

// Handling Errors
set_error_handler([Error::class, 'errorHandler']);
set_exception_handler([Error::class, 'exceptionHandler']);
register_shutdown_function([Error::class, 'shutdownHandler']);

// Get Db Connection File
require_once(__DIR__.'/Connection.php');

// Session Time
Session::set(['initiate'=>time()]);

// Set Response Headers
Response::header();

// Set Time Zone
Date::setTimezone(Option::time_zone());

// Require Classes & Functions
array_filter(Directory::folders('resources'), function($dir){
    array_filter(Directory::files("{$dir}", 'php'), function($path){
        require($path);
    });
});