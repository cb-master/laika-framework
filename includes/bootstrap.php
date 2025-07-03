<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

use CBM\Core\ErrorHandler\ErrorHandler;
use CBM\Core\Directory\Directory;
use CBM\Model\ConnectionManager;
use CBM\Core\Response\Response;
use CBM\Session\SessionManager;
use CBM\Core\Config\Config;
use CBM\Core\Option\Option;
use Exception;

require(__DIR__.'/../vendor/autoload.php');

// Load Configs
Config::set(Directory::files(ROOTPATH.'/configs', 'php'));

// Register Error Handler
ErrorHandler::register(Config::get('app', 'debug'));

// Add Database Connection
try{ConnectionManager::add(Config::get('database'));}catch(Exception $e){}

// Set Session In DB or Not. Default is In DB
if(Option::key('dbsession') == 'yes'){
    try{ SessionManager::init(ConnectionManager::get()); }catch(Exception $e){}
}else{
    SessionManager::init();
}
// Set Response Headers
Response::header();

// Load postload file if custom filters/functions/clases to load
require_once(ROOTPATH.'/system/custom.php');