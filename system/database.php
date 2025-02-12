<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || defined('CONSOLEPATH') || http_response_code(403).die('403 Forbidden Access!');

return [
    // DB Driver
    'driver'=>'mariadb',

    // DB Host
    'host'=>'localhost',

    // DB Port
    'port'=>3306,

    // DB Name
    'name'=>'test',

    // DB User
    'user'=>'root',

    // DB Password
    'password'=>''
];