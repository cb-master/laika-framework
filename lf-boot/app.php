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
defined('APP_PATH') || define('APP_PATH', realpath(__DIR__.'/../'));

// ################################################################
// --------------------- LOAD BOOT LOADER ---------------------- //
// ################################################################
require __DIR__."/loader.php";

// ################################################################
// ------------------- LOAD ROUTER ------------------- //
// ################################################################
require __DIR__."/routers.php";
