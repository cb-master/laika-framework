<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Core\Config\Config;

////////////////////////////////////////////
////////////////////////////////////////////

//// PLEASE DO NOT EDIT AFTER THIS LINE ////

////////////////////////////////////////////
////////////////////////////////////////////

// Initiate Databace Connection Config
CBM\Model\Model::config(Config::get('database'));