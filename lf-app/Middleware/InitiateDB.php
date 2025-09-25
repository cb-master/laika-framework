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

namespace CBM\App\Middleware;

// Deny Direct Access
defined('APP_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use CBM\Model\ConnectionManager;
use CBM\Core\Config;

class InitiateDB
{
    // Initiate DB
    public function __construct(){
        try {
            // Return if already connected
            if(ConnectionManager::has('default')) return;
            // Add Connection
            ConnectionManager::add(Config::get('database', 'default'));
        } catch (\Throwable $th) {}
    }

    // Handle
    public function handle($args){}
}