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

use CBM\Core\App\Http;

// Start Register API Http From Here
// ###### Sample: #######
// Http::get('/sample', 'SampleController@index');
// ##### With Middleware #####
// Http::get('/sample', 'SampleController@index', [CBM\App\Middleware\SampleMiddleware::class]);
// ##### Post Request #####
// Http::post('/sample', 'SampleController@index');

Http::get('/status', function() {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'API is Working With Get Method']);
});

Http::put('/status', function() {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'API is Working With Put Method']);
});