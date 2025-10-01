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

namespace CBM\App\Controller;

// Deny Direct Access
defined('APP_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use CBM\Core\App\Controller;

class HomeController Extends Controller
{
    /**
    * Args contains Request Object and Other Route Parameters
    */
    public function index(array $args)
    {
        // Args contains Request Object and other route parameters
        /**
         * Using Without Template Engine Compile View File
        */
        // Set Data
        $this->assign($args);
        $this->assign('title', 'Laika Framework');
        $this->assign('welcome', 'Welcome to Laika PHP MVC Framework!');
        
        // load View File
        $this->view('home');
    }
}