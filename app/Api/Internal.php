<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

namespace CBM\App\Api;

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Core\Response\Response;
use CBM\Core\Request\Request;
use CBM\Model\Model;

class Internal
{
    // Acceptable Methods
    public static array $methods = ["GET", "POST", "PATCH", "DELETE"];

    public static function init():array
    {
        // Set Response Headers
        Response::setHeader([
            'Access-Control-Allow-Methods'  =>  implode(", ", self::$methods),
            'Access-Control-Allow-Headers'  =>  'Authorization, Origin, X-Requested-With, Content-Type, Accept'
        ]);

        // Request Deny If Remote Is Not Server Self
        if($_SERVER['REMOTE_ADDR'] != $_SERVER['SERVER_ADDR']){
            return [
                'code'      =>  Response::code(403),
                'status'    =>  'failed',
                'message'   =>  'Request is not allowed!',
                'data'      =>  []
            ];
        }

        // Request Deny If Authorization Header is Missing
        if(!isset($_SERVER['HTTP_AUTHORIZATION'])){
            return [
                'code'      =>  Response::code(401),
                'status'    =>  'failed',
                'message'   =>  'No token found!',
                'data'      =>  []
            ];
        }

        // Request Deny If Request Method is Missing
        if(!in_array(self::method(), self::$methods)){
            return self::unsupported_method();
        }

        // Request Deny If Content Type Is Not Supported
        if(!isset($_SERVER['CONTENT_TYPE']) || (strtolower($_SERVER['CONTENT_TYPE']) != 'application/json')){
            return [
                'code'      =>  Response::code(415),
                'status'    =>  'failed',
                'message'   =>  'Invalid Content Type!',
                'data'      =>  []
            ];
        }

        // Request Deny If is Not A Valid Admin Token
        $staff = Model::table('admins')->filter('token', '=', $_SERVER['HTTP_AUTHORIZATION'])->get('token');
        if(count($staff) !== 1){
            return [
                'code'      =>  Response::code(401),
                'status'    =>  'failed',
                'message'   =>  'Invalid Staff Token!',
                'data'      =>  []
            ];
        }
        return [];
    }

    // Unsupported Method
    public static function unsupported_method():array
    {
        return [
            'code'      =>  Response::code(405),
            'status'    =>  'failed',
            'message'   =>  'Unsupported Method!',
            'data'      =>  []
        ];
    }
    
    // Get Request Data
    public static function request():array
    {
        // Get Request Data
        $request_data = json_decode(file_get_contents('php://input'), true);
        return (new Request)->purify($request_data ?: []);
    }

    // Request Method
    public static function method():string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    // Set Output
    /**
     * @param int $code Optional Parameter. Default is 200.
     * @param array $data Optional Parameter. Default is [].
     * @param string $message Optional Parameter. Default is ''.
     */
    public static function setOutput(int $code = 200, array $data = [], string $message = '')
    {
        return [
            'code'      =>  Response::code($code),
            'status'    =>  ($code == 200) ? 'success' : 'failed',
            'message'   =>  $message,
            'data'      =>  $data
        ];
    }
}