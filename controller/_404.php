<?php

// Deny Direct Access
defined('ROOTPATH') || http_response_code(403).die('Direct Access Denied!');

class _404
{
    public function index()
    {
        http_response_code(404);
        echo '<h1>404 Front Not Found</h1>';
    }
}