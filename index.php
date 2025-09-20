<?php
/**
 * Laika PHP MVC Framework
 * Author: Showket Ahmed
 * Email: riyadhtayf@gmail.com
 * License: MIT
 * This file is part of the Laika PHP MVC Framework.
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

// Define The Base Path
define('BASE_PATH', realpath(__DIR__));

// Load Boot Loader
// This file is responsible for loading the framework and initializing the application.
require_once BASE_PATH . '/boot/loader.php';