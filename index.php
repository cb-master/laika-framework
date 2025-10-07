<?php
/**
 * Laika PHP MVC Framework
 * Author: Showket Ahmed
 * Email: riyadhtayf@gmail.com
 * License: MIT
 * This file is part of the Laika PHP MVC Framework.
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

// Define ROOTPATH
define('ROOTPATH', __DIR__);

// ################################################################
// ------------------------ USE ROUTER ------------------------- //
// ################################################################
use CBM\Core\App\Http;


// ################################################################
// ------------------------- LOAD APP -------------------------- //
// ################################################################
require_once __DIR__ . '/lf-boot/app.php';


// ################################################################
// --------------------- DISPATCH ROUTERS ---------------------- //
// ################################################################
Http::dispatch();
// ################################################################