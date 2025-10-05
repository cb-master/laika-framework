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

// Namespace
namespace CBM\App\Middleware;

// Deny Direct Access
defined('APP_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use CBM\Model\ConnectionManager;
use CBM\Session\SessionManager;
use CBM\Core\Config;

class ConfigMiddleware
{
    public function __construct(){

        // Set Database Connection
        try {

            $configs = Config::get('database');
            foreach($configs as $name => $config){
                if(!ConnectionManager::has($name)) ConnectionManager::add($config, $name);
            }
        } catch (\Throwable $th) {}

        // Start Session Manager
        $config = ConnectionManager::has('default') ? ConnectionManager::get() : [];
        SessionManager::init($config);

        // Set Language File Name
        apply_filter('app.language.load');
    }

    /**
     * @param \Closure $next. $next will bypass to controller if called
     * @param ...$params Dynamic Parameters
     */
    public function handle(\Closure $next, mixed ...$params)
    {
        // Start Code From Here....


        return $next();
    }

    public function terminate(string $response, ...$params): string
    {
        // After controller
        // Write Code From Here ......

        

        // You can modify the response if needed
        return $response;
    }
}