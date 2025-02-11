<?php
/**
 * Name:                Laika Framework
 * Author:              Showket Ahmed
 * Uri:                 https://cloudbillmaster.com
 * Email:               riyadtayf@gmail.com
 * Version:             1.0.0
 * Provider:            Cloud Bill Master Ltd.
 * PHP Version Required: 8.2.0
 */

// Forbidden Access
defined('CONSOLEPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Core\Config\Config;

// Get Database Configs
$configs[basename(CONSOLEPATH.'/system/app.php', '.php')] = require(CONSOLEPATH.'/system/app.php');
$configs[basename(CONSOLEPATH.'/system/database.php', '.php')] = require(CONSOLEPATH.'/system/database.php');

// Require Autoload
require_once(CONSOLEPATH."/vendor/autoload.php");

// Set Config Environments
Config::set($configs);

// Get Db Connection File
CBM\Model\Model::config(Config::get('database'));