<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

 // Define ROOTPATH
define('ROOTPATH', __DIR__);

use CBM\Core\App\App;
use CBM\Core\Helper\Helper;

// Require Init File
require_once(ROOTPATH."/includes/Init.php");
$token = Helper::generateToken(['name'=>'sssds','id'=>1]);
show($token);
dd(Helper::isValidToken($token));
// Run Application
App::run();