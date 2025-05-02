<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Core\Directory\Directory;
use CBM\Model\ConnectionManager;
use CBM\Core\Response\Response;
use CBM\Session\SessionConfig;
use \CBM\Handler\Error\Error;
use CBM\Core\Config\Config;
use CBM\Core\Option\Option;
use CBM\Core\Vault\Vault;
use CBM\Core\Date\Date;

// Require Config & Constants
require_once(__DIR__."/../config.php");

// Require Autoload
require_once(__DIR__."/../vendor/autoload.php");

Config::set(Directory::files(__DIR__.'/../system', 'php'));

// Connect Database
ConnectionManager::add(Config::get('database','default'));

// Set Session PDO
SessionConfig::setPdo(ConnectionManager::get());

// Set Secret If Missing
if(!Config::get('app','secret')){
    Vault::generateSecretKey();
}

// Register Error Handler
Error::registerErrorHandlers(DEBUG);

// Set Time Zone
Date::setTimezone(Option::key('time_zone'));

// Set Response Headers
Response::header();

// Require Default Classes
array_filter(Directory::files(__DIR__.'/classes', 'php'), function($path){
    require($path);
});

// Load postload file if custom filters/functions/clases to load
require_once(__DIR__.'/../resources/postload.php');