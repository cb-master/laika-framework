<?php
/**
 * Laika PHP MVC Framework
 * Author: Showket Ahmed
 * Email: riyadhtayf@gmail.com
 * License: MIT
 * This file is part of the Laika PHP MVC Framework.
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

// Deny Direct Access
defined('BASE_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use CBM\Core\{Directory, Config, ErrorHandler, App\Router, Http\Response};

################################################################
// ----------------------- AUTOLOADER ----------------------- //
################################################################
/**
 * Load The Autoloader
 */
require_once BASE_PATH . '/vendor/autoload.php';
################################################################



################################################################
// ----------------- REGISTER ERROR HANDLER ----------------- //
################################################################
// Register Error Handler
ErrorHandler::register();
################################################################



################################################################
// ---------------------- SECRET KEY ------------------------ //
################################################################
/**
 * Create Secret Config File if Not Exist
 */
if(!Config::has('secret')) Config::create('secret', ['key'=>bin2hex(random_bytes(32))]);
/**
 * Create Secret Key Value Not Exist
 */
if(!Config::has('secret', 'key')) Config::set('secret', 'key', bin2hex(random_bytes(32)));
################################################################



################################################################
// -------------------- REGISTER HEADER --------------------- //
################################################################
/**
 * Register Default Header
 */
Response::register();
################################################################



################################################################
// ----------------- AUTOLOAD HELPER FILES ------------------ //
################################################################
/**
 * Register All Functions, Filters, Constants etc
 * Make 'helpers' Path if Not Available
 */
$helpers_path = BASE_PATH . '/helpers';
Directory::make($helpers_path);
$paths = Directory::scanRecursive($helpers_path, false, 'php');
array_map(function ($path) { require $path; }, $paths);
################################################################



################################################################
// ------------------- REGISTER ROUTERS --------------------- //
################################################################
/**
 * Require All Route Files
 * This Will Load All PHP Files in The app/Routes Directory
 * and Register Their Routes With The Router
 */
$routes = Directory::files(BASE_PATH . '/Routes', 'php');
array_map(function ($route) { require_once $route; }, $routes);
################################################################



################################################################
// ------------------- DISPATCH ROUTERS --------------------- //
################################################################
Router::dispatch();
################################################################