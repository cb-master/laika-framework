<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

use CBM\Core\ErrorHandler\ErrorHandler;
ini_set('display_errors', 1);
require(__DIR__.'/../vendor/autoload.php');
// Register Error Handler
ErrorHandler::register(true);