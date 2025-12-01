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

// Define App Path
defined('APP_PATH') || define('APP_PATH', dirname(__DIR__));

use Laika\Core\App\Route\Url;

################################################################
// ----------------------- AUTOLOADER ----------------------- //
################################################################
require_once APP_PATH . '/vendor/autoload.php';
// ---------------------------------------------------------- //

################################################################
// ----------------- RESOURCE REGISTER ---------------------- //
################################################################
/**
 * Add Resource URL Path Name. URL Example: https://yoursite.com/resource/{name}
 * Example: 'resource' for '/resource/{name}'
 */
Url::ResourceSlug('resource'); // Change 'resource' to your desired slug

/**
 * Load URL Routes from routes directory
 */
Url::LoadRoutes();
################################################################
