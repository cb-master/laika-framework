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
defined('BASE_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use CBM\Core\App\Controller;
use CBM\Core\Template;

class HomeController Extends Controller
{
    public function without_template_engine()
    {
        /**
         * Using Without Template Engine Compile View File
         */
        // Set Data
        $data = ['title'=>'Home'];
        // load View File
        $this->view('home', $data);
    }

    public function with_template_engine()
    {
        /**
         * Using Template Engine Compile View File
         */
        // Get Template Engine
        $tpl = new Template();
        // Assign Data
        $tpl->assign('title', 'Home');
        // Load View File
        $tpl->render('home-without-engine');
    }
}