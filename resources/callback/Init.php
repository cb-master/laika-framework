<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Core\Response\Response;
use CBM\Core\Directory\Directory;
use CBM\Core\Request\Request;
use CBM\Core\Config\Config;
use CBM\Model\Model;

// Require Vendor File
require_once(__DIR__.'/../../vendor/autoload.php');

// Set Response Headers
Response::header();

// Require All Config Environment Files
foreach(Directory::requires(__DIR__.'/../../config', 'php') as $path){
    $configs[basename($path, '.php')] = require($path);
}
// Set Config Environments
Config::set($configs);

// Get Db Connection File
require_once(__DIR__.'/../../includes/Connection.php');

// Request Deniy If Remote Is Not Server Self
if(!Request::apiOnly()){
    print(json_encode([
        'code'      =>  'AP403',
        'status'    =>  'failed',
        'message'   =>  'Request is not allowed!',
        'data'      =>  []
    ], JSON_FORCE_OBJECT | JSON_PRETTY_PRINT));
    Response::set(403);
    die();
}

// Request Deniy If Authorization Header is Missing
if(!isset($_SERVER['Authorization'])){
    print(json_encode([
        'code'      =>  'AP401',
        'status'    =>  'failed',
        'message'   =>  'No token found!',
        'data'      =>  []
    ], JSON_FORCE_OBJECT | JSON_PRETTY_PRINT));
    Response::set(401);
    die();
}

// Request Deniy If is Not A Valid Admin Token
$staff = Model::table('admins')->filter('token', '=', $_SERVER['Authorization'])->get('token');
if(count($staff) !== 1){
    print(json_encode([
        'code'      =>  'AP401',
        'status'    =>  'failed',
        'message'   =>  'Invalid Token!',
        'data'      =>  []
    ], JSON_FORCE_OBJECT | JSON_PRETTY_PRINT));
    Response::set(401);
    die();
}