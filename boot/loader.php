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

// Load the autoloader
require_once BASE_PATH . '/vendor/autoload.php';

// Register Error Handler
ErrorHandler::register();

// Create Secfret Config if Not Exist
if(!Config::has('secret')) Config::set('secret', ['key'=>bin2hex(random_bytes(128))]);
// Create Secret Key if Not Exist
if(!Config::get('secret', 'key')) Config::updateKey('secret', 'key', bin2hex(random_bytes(128)));

// Register Default Header
Response::register();

// Require all route files
// This will load all PHP files in the app/Routes directory
// and register their routes with the router
$routes = Directory::files(BASE_PATH . '/Routes', 'php');
array_map(function($route){
    require_once $route;
}, $routes);

// Dispatch Router
Router::dispatch();