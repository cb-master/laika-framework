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

namespace Laika\App\Middleware;

// Deny Direct Access
defined('APP_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use Laika\Core\Helper\Connect;
use Closure;

class Initiator extends Connect
{
    /**
     * @param Closure $next. $next will Pass Parameters to Next Middleware or Controller
     * @param $params Parameters
     */
    public function handle(Closure $next, $params)
    {
        /**
         * Start Database
         */
        self::db();
        /**
         * Start Session
         */
        self::session();
        /**
         * Start Time Zone
         */
        self::timezone();
        /**
         * Change Local
         */
        self::setLocal();
        /**
         * Start Local
         * $params['type'] = User Type. Example: 'admin'/'client'
         */
        self::local($params['type'] ?? null);

        return $next($params);
    }
}