<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use \Smarty\Smarty;

class Template
{
    // All Variables
    private static array $vars = [];
    
    // Defined Functions
    private static array $functions = [];
    
    // Defined Blocks
    private static array $blocks = [];

    /**
	 * define caching modes
	 */
	const CACHING_OFF = 0;
	const CACHING_LIFETIME_CURRENT = 1;
	const CACHING_LIFETIME_SAVED = 2;

    // Instance
    private static null|object $instance = null;

    // Get Instance
    private static function instance():object
    {
        self::$instance = self::$instance ?: new Smarty;
        return self::$instance;
    }

    // Set Template Directory
    public static function setTemplateDir(string $path)
    {
        self::instance()->setTemplateDir($path);
    }

    // Set Compile Directory
    public static function setCompileDir(string $path):void
    {
        self::instance()->setCompileDir($path);
    }

    // Set Config Directory
    public static function setConfigDir(string $path):void
    {
        self::instance()->setConfigDir($path);
    }

    // Set Cache Directory
    public static function setCacheDir(string $path):void
    {
        self::instance()->setCacheDir($path);
    }

    // Set Escape Html
    public static function setEscapeHtml(bool $escape = true):void
    {
        self::instance()->setEscapeHtml($escape);
    }

    // Set Caching
    public static function setCaching(int|string $caching = self::CACHING_OFF):void
    {
        self::instance()->caching = (int) $caching;
    }

    // Set Cache Lifetime
    public static function setCacheLifetime(int|string $time = 3600):void
    {
        if(self::instance()->caching == 2){
            self::instance()->setCacheLifetime((int) $time);
        }
    }

    // Clear All Cache
    public static function clearCache():void
    {
        self::instance()->clearAllCache();
    }

    // Assign Values
    public static function assign(string $key, mixed $value):void
    {
        self::$vars[$key] = $value;
        self::instance()->assign($key, $value);
    }

    // Display Template
    public static function display(string $path):void
    {
        self::instance()->display($path);
    }

    // Register Function
    /**
     * Doc -> https://www.smarty.net/docs/en/api.register.plugin.tpl
     */
    public static function registerFunction(string $name, callable $callback):void
    {
        self::$functions[] = $name;
        self::instance()->registerPlugin('modifier', $name, $callback);
    }

    // Register Block
    /**
     * Doc -> https://www.smarty.net/docs/en/api.register.plugin.tpl
     */
    public static function registerBlock(string $name, callable $callback):void
    {
        self::$blocks[] = $name;
        self::instance()->registerPlugin('blcok', $name, $callback);
    }

    // Get Loaded Functions
    public static function loadedFunctions()
    {
        return self::$functions;
    }

    // Get Loaded Blocks
    public static function loadedBlocks()
    {
        return self::$blocks;
    }

    // Get Loaded Variables
    public static function loadedVars()
    {
        return self::$vars;
    }

}