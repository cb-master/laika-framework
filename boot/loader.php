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

use CBM\Core\Http\Response;
use CBM\Core\ErrorHandler;
use CBM\Core\App\Router;
use CBM\Core\Directory;
use CBM\Core\Config;

// Load the autoloader
require_once BASE_PATH . '/vendor/autoload.php';

// Load the configuration files
$configs = Directory::files(BASE_PATH.'/config', 'php');
Config::set($configs);

// Register Error Handler
ErrorHandler::register();

// Register Default Header
Response::defaultHeader();

// Load Router
$router = new Router();

// Require all route files
// This will load all PHP files in the app/Routes directory
// and register their routes with the router
$routes = Directory::files(BASE_PATH . '/app/Routes', 'php');
array_map(function($route) use ($router){ // Use $router in the closure to register routes
    require_once $route;
}, $routes);

// Dispatch Router
$router->dispatch();