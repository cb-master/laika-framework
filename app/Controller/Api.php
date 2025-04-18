<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Namespace
namespace CBM\App\Controller;

use CBM\Core\Api\APIMessage;
use CBM\Core\Api\Validate;
use CBM\Core\Api\Headers;
use CBM\Core\Api\Token;

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

/**
* class Index Extends Controller
* {
*    public function index()
*    {
*        $data['title'] = 'Laika Home Page';

*        //// For Middleware
*        // $this->middleware('class', 'method', []);
*        //// For View
*        $this->view('index', $data);
*    }
* }
*/

class Api
{
    // Write API Links as Method From Here
}