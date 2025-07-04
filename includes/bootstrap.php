<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

use CBM\Model\ConnectionManager;
use CBM\Session\SessionManager;
use CBM\Core\ErrorHandler;
use CBM\Core\Directory;
use CBM\Core\Response;
use CBM\Core\Config;

// Require Vendor Autoloader
require(__DIR__.'/../vendor/autoload.php');

// Load Configs
Config::set(Directory::files(ROOTPATH.'/configs', 'php'));

// Register Error Handler
ErrorHandler::register(Config::get('app','debug'));

// Generate Secret
if(!Config::get('secret','key')) Config::change('secret','key', bin2hex(random_bytes(128)));

// Add Database Connection
try{ConnectionManager::add(Config::get('database'));}catch(Exception $e){}

// Initialize Session Manager
SessionManager::init();

// Set Response Headers
Response::header();

// Load postload file if custom filters/functions/clases to load
require_once(__DIR__.'/register.php');