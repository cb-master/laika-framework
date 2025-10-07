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

use CBM\Core\{Directory, App\Http};

################################################################
// -------------------- LOAD ROUTES ------------------------- //
################################################################
$routes = Directory::files(APP_PATH . '/lf-routes', 'php');
array_map(function ($route) { require_once $route; }, $routes);
################################################################


################################################################
// -------------------/- LOAD RESOURCE ---------------------- //
################################################################
Http::get('/resource/{path:.+}', function($param) {
    // Trim leading/trailing slashes
    $param['path'] = trim($param['path'], '/');

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
        'ico'   =>  'image/x-icon',
    ];

    // Get Asset File Path
    $file = realpath(APP_PATH."/lf-templates/{$param['path']}") ?: APP_PATH . "/lf-assets/{$param['path']}";
    if(!is_file($file)){
        http_response_code(404);
        return;
    }

    // Read File
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if (array_key_exists(strtolower($ext), $types)) header("Content-Type: {$types[$ext]}");
    readfile($file);
    return;
});