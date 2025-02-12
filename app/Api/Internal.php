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

    public static function init():string
    {
        // Set Response Headers
        Response::header([
            'Access-Control-Allow-Methods'  =>  implode(",", self::$methods),
            'Access-Control-Allow-Headers'  =>  'Authorization, Origin, X-Requested-With, Content-Type, Accept'
        ]);

        // Request Deny If Remote Is Not Server Self
        if($_SERVER['REMOTE_ADDR'] != $_SERVER['SERVER_ADDR']){
            Response::set(403);
            return json_encode([
                'code'      =>  'AP403',
                'status'    =>  false,
                'message'   =>  'Request is not allowed!',
                'data'      =>  []
            ], JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);
        }

        // Request Deny If Authorization Header is Missing
        if(!isset($_SERVER['HTTP_AUTHORIZATION'])){
            Response::set(401);
            return json_encode([
                'code'      =>  'AP401',
                'status'    =>  false,
                'message'   =>  'No token found!',
                'data'      =>  []
            ], JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);
        }

        // Request Deny If Request Method is Missing
        if(!in_array(self::method(), self::$methods)){
            Response::set(405);
            return json_encode([
                'code'      =>  'AP405',
                'status'    =>  false,
                'message'   =>  'Unsupported Method!',
                'data'      =>  []
            ], JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);
        }

        // Request Deny If Content Type Is Not Supported
        if(!isset($_SERVER['CONTENT_TYPE']) || (strtolower($_SERVER['CONTENT_TYPE']) != 'application/json')){
            Response::set(415);
            return json_encode([
                'code'      =>  'AP415',
                'status'    =>  false,
                'message'   =>  'Content Type Should Be JSON!',
                'data'      =>  []
            ], JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);
        }

        // Request Deny If is Not A Valid Admin Token
        $staff = Model::table('admins')->filter('token', '=', $_SERVER['HTTP_AUTHORIZATION'])->get('token');
        if(count($staff) !== 1){
            Response::set(401);
            return json_encode([
                'code'      =>  'AP401',
                'status'    =>  false,
                'message'   =>  'Invalid Token!',
                'data'      =>  []
            ], JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);
            die();
        }
        return '';
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

    // Unsupported Method
    public static function unsupported_method()
    {
        Response::set(405);
        return json_encode([
            'code'      =>  'AP405',
            'status'    =>  false,
            'message'   =>  'Unsupported Method!',
            'data'      =>  []
        ], JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);
    }

}
