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
defined('APP_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use CBM\Core\{Directory, Config, ErrorHandler, Http\Response};

################################################################
// ----------------------- AUTOLOADER ----------------------- //
################################################################
require_once APP_PATH . '/vendor/autoload.php';
################################################################



################################################################
// ----------------- REGISTER ERROR HANDLER ----------------- //
################################################################
// Register Error Handler
ErrorHandler::register();
################################################################


################################################################
// ------------------- REGISTER TIMEZONE -------------------- //
################################################################
// Register Default Time Zone
date_default_timezone_set(option('time.zone', 'Europe/London'));
################################################################


################################################################
// ---------------------- SECRET KEY ------------------------ //
################################################################
/**
 * Create Secret Config File if Not Exist
 */
if(!Config::has('secret')) Config::create('secret', ['key'=>bin2hex(random_bytes(64))]);
/**
 * Create Secret Key Value Not Exist
 */
if(!Config::has('secret', 'key')) Config::set('secret', 'key', bin2hex(random_bytes(64)));
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
$hooks_path = APP_PATH . '/lf-hooks';

// Create Directory if Not Exists
Directory::make($hooks_path);

// Load Helpers
$paths = Directory::scanRecursive($hooks_path, false, 'php');
array_map(function ($path) { require $path; }, $paths);
################################################################