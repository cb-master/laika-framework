<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

 // Define ROOTPATH
define('ROOTPATH', __DIR__);

use CBM\Core\App\App;

// Require Init File
require_once(ROOTPATH."/includes/Init.php");

// Run Application
App::run();