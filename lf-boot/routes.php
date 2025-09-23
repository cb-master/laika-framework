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

use CBM\Core\{Directory, App\Router};

################################################################
// -------------------- LOAD ROUTES ------------------------- //
################################################################
// Load All Config Files
$routes = Directory::files(APP_PATH . '/lf-routes', 'php');
array_map(function ($route) { require_once $route; }, $routes);
################################################################


################################################################
// -------------------- LOAD RESOURCES ---------------------- //
################################################################
Router::get('/assets/{path:.+}', function($path) {
    // Trim leading/trailing slashes
    $path = trim($path, '/');

    // Supported Content Types
    $types = [
        'css'   =>  'text/css',
        'js'    =>  'application/javascript',
        'png'   =>  'image/png',
        'jpg'   =>  'image/jpeg',
        'jpeg'  =>  'image/jpeg',
        'gif'   =>  'image/gif',
        'svg'   =>  'image/svg+xml',
        'webp'  =>  'image/webp',
    ];

    // Custom Assets Path
    $path = str_replace('resource', 'assets', $path);
    $file = realpath(APP_PATH."/{$path}");
    if($file && is_file($file)){
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if (array_key_exists($ext, $types)) header("Content-Type: {$types[$ext]}");
        readfile($file);
        return;
    }

    // System Assets Path
    $file = APP_PATH . '/lf-assets/' . $path;
    if (file_exists($file)) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if (array_key_exists($ext, $types)) header("Content-Type: {$types[$ext]}");
        readfile($file);
        return;
    }
    http_response_code(404);
    return;
});


################################################################
// ------------------- DISPATCH ROUTERS --------------------- //
################################################################
Router::dispatch();
################################################################