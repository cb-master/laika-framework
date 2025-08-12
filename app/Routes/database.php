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

return [
    // Driver
    'driver' => 'mysql',
    // Host
    'host' => 'localhost',
    // Port
    'port' => 3306,
    // Database Name
    'dbname' => 'cbm',
    // Username
    'username' => 'root',
    // Password
    'password' => 'T@zwar127169'
];