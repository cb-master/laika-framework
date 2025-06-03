<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

use CBM\Core\App\Controller;

class Index extends Controller
{
    public function Index($args)
    {
        $this->assign('title', 'Welcome to LAIKA Framework');
        $this->assign($args);
        $this->view('index', $args);
    }
}