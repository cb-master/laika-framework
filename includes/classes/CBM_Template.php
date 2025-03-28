<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Handler\Error\Error;
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

    // Get Smarty Instance
    public static function smarty():object
    {
        self::$instance = self::$instance ?: new Smarty;
        return self::$instance;
    }

    // Set Cache Directory
    public static function setCacheDir(string $path):void
    {
        self::smarty()->setCacheDir($path);
    }

    // Set Escape Html
    public static function setEscapeHtml(bool $escape = true):void
    {
        self::smarty()->setEscapeHtml($escape);
    }

    // Set Caching
    public static function setCaching(int|string $caching = self::CACHING_OFF):void
    {
        self::smarty()->caching = (int) $caching;
    }

    // Set Cache Lifetime
    public static function setCacheLifetime(int|string $time = 3600):void
    {
        if(self::smarty()->caching == 2){
            self::smarty()->setCacheLifetime((int) $time);
        }
    }

    // Clear All Cache
    public static function clearCache():void
    {
        self::smarty()->clearAllCache();
    }

    // Register Function
    /**
     * Doc -> https://www.smarty.net/docs/en/api.register.plugin.tpl
     */
    public static function registerFunction(string $name, callable $callback):void
    {
        self::$functions[] = $name;
        self::smarty()->registerPlugin('modifier', $name, $callback);
    }

    // Register Block
    /**
     * Doc -> https://www.smarty.net/docs/en/api.register.plugin.tpl
     */
    public static function registerBlock(string $name, callable $callback):void
    {
        self::$blocks[] = $name;
        self::smarty()->registerPlugin('blcok', $name, $callback);
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

    public static function __callStatic($name, $arguments):mixed
    {
        try{
            return call_user_func_array([self::smarty(), $name], $arguments);
        }catch(Error $er) {
            Error::throw($er);
        }
        return false;
    }
}