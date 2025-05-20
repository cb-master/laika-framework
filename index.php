<?php

// Define ROOTPATH
define('ROOTPATH', __DIR__);

use CBM\Core\App\App;

require_once ROOTPATH . '/includes/init.php';

App::run();