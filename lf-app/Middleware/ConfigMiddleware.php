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
namespace Laika\App\Middleware;

// Deny Direct Access
defined('APP_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use Laika\Model\ConnectionManager;
use Laika\Session\SessionManager;
use Laika\Core\Config;
use RuntimeException;
use Closure;

class ConfigMiddleware
{
    public function __construct(){

        // Set Database Connection
        try {

            $configs = Config::get('database', default:[]);
            foreach ($configs as $name => $config) {
                ConnectionManager::add($config, $name);
            }
        } catch (\Throwable $th) {
            if (option('debug')) {
                throw new RuntimeException($th->getMessage(), $th->getCode(), $th);
            }
        }
        // Start Session Manager
        $config = ConnectionManager::has('default') ? ConnectionManager::get() : [];
        SessionManager::config($config);
    }

    /**
     * @param Closure $next. $next will bypass to controller if called
     * @param ...$params Dynamic Parameters
     */
    public function handle(Closure $next, array $params)
    {
        // Load Language
        isset($params['type']) ? apply_filter('app.language.load', $params['type']) : apply_filter('app.language.load');

        return $next($params);
    }

    public function terminate(string $response, Closure $next, array $params): string
    {
        // After controller
        // Write Code From Here ......

        // You can modify the response if needed
        return $next($response);
    }
}
