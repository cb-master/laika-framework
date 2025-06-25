<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

use CBM\Core\App\Controller;

$controller = new Controller();
$controller->assign('title','404 Page Not Found!');
$controller->view('404');