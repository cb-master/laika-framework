<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Namespace
namespace CBM\App\Controller;

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\App\Controller;
use Template;


class _404 Extends Controller
{
    public function index()
    {
        Template::assign('title', 'Page Not Found');
        $this->view(apply_filter('load_view', '_404'));
    }
}