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

use CBM\Core\App\Router;

/**
 * Start Register Routers From Here
 * 
 * ###### Sample: #######
 * Router::get('/sample', 'SampleController@index');
 * 
 * ##### With Middleware #####
 * Router::get('/sample', 'SampleController@index', [CBM\App\Middleware\SampleMiddleware::class]);
 * 
 * ##### Post Request #####
 * Router::post('/sample', 'SampleController@index');
 */

Router::get('/', 'HomeController@index');
Router::get('/template', 'HomeController@tplIndex');
