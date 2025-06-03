<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

use CBM\Core\App\Controller;
class _404 extends Controller
{
    public function Index($args)
    {
        http_response_code(404);
        $this->assign('title', '404 - Page Not Found!');
        $this->view('404', $args);
    }
}