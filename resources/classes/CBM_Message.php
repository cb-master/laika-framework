<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Session\Session;

class Message
{
    // Set Message
    /**
     * @param string $message - Required Argument as Message
     * @param bool $type - Optional Argument as Message Type. Default is true as success
     */
    public static function set(string $message, bool $type = true):void // True is Success & False is Error
    {
        // Get Success or Error Message
        $message = $type ? "<div id=\"app-success-message\">".$message."</div>" : "<div id=\"app-error-message\">".$message."</div>";

        Session::set(['message' => $message]);
    }

    // Get Message
    public static function get():string
    {
        $message = Session::get('message');
        Session::pop('message');
        return $message;
    }    
}