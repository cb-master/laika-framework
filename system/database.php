<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || defined('CONSOLEPATH') || http_response_code(403).die('403 Forbidden Access!');

return [
    'default'   => [
                'driver'=>'mysql',

                // DB Host
                'host'=>'localhost',

                // DB Port
                'port'=>3306,

                // DB Name
                'dbname'=>'test',

                // DB User
                'username'=>'cbm',

                // DB Password
                'password'=>'12345678'
            ],
    // 'read'      => [
    //         'driver'=>'mysql',

    //         // DB Host
    //         'host'=>'localhost2',

    //         // DB Port
    //         'port'=>3306,

    //         // DB Name
    //         'dbname'=>'test2',

    //         // DB User
    //         'username'=>'cbm2',

    //         // DB Password
    //         'password'=>'12345678'
    // ]
];