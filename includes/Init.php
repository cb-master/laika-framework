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
use CBM\Core\Date\Date;
use CBM\Model\Model;

// Require Config & Constants
require_once(__DIR__."/../config.php");
require_once(__DIR__."/../constants.php");

// Require Autoload
require_once(__DIR__."/../vendor/autoload.php");

// Require All Config Environment Files
foreach(Directory::files(__DIR__.'/../system', 'php') as $path){
    Config::set([strtolower(basename($path, '.php'))=>require($path)]);
}

// Register Error Handler
Error::registerErrorHandlers(DEBUG);

// Connect Database
Model::config(Config::get('database'));

// Set Time Zone
Date::setTimezone(Option::key('time_zone'));

// Set Response Headers
Response::header();

// Require Classes & Functions
array_filter(Directory::folders(__DIR__.'/../resources'), function($dir){
    array_filter(Directory::files("{$dir}", 'php'), function($path){
        require($path);
    });
});

// Load postload file if custom filters/functions/clases to load
require_once(__DIR__.'/../resources/postload.php');