<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Namespace
namespace CBM\App;

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\COre\Directory\Directory;
use CBM\Core\Option\Option;
use Template;

class Controller
{
    // Load Middleware and Execute
    /**
     * @param string $class - Required Argument as Middleware Class Name Like 'Client'.
     * @param string $method - Required Argument as Middleware Method Name.
     * @param array $args - Optionsl Argument. Default is Blank Array.
     */
    protected function middleware(string $class, string $method, mixed ...$args):void
    {
        // Create Middleware Folder if Does Not Exist
        if(!file_exists(ROOTPATH.'/app/Middleware')){
            mkdir(ROOTPATH.'/app/Middleware');
        }
        // Load Middleware if Exist
        $class = "\\CBM\\App\\Middleware\\{$class}";
        call_user_func([$class, $method], ...$args);
    }

    // Load View
    /**
     * @param string $view - Required Argument as view file
     */
    protected function view(string $view):void
    {
        // Theme File
        $view = ROOTPATH . "/views/{$view}.tpl";
        $functions_dir = dirname($view).'/functions';
        if(file_exists($functions_dir)){
            array_filter(Directory::files($functions_dir, 'php'), function($file){
                require($file);
            });
        }
        
        // Config Smarty Template
        $template = $this->set_template_directory();
        Template::setTemplateDir($template['dir']);
        Template::setCompileDir($template['compile']);
        Template::setConfigDir($template['config']);
        Template::setCacheDir($template['cache']);
        Template::setCaching((int) Option::key('template_caching'));
        Template::setCacheLifetime((int) Option::key('template_cache_lifetime'));
        // Set Template Directory
        $dir = dirname($view).'/layouts';
        if(!file_exists($dir)){
            mkdir($dir);
        }
        Template::addTemplateDir($dir);
        // Register Functions
        $funcs = get_defined_functions()['user'];
        foreach($funcs as $func){
            Template::registerFunction($func, $func);
        }
        // Load View File
        Template::display($view);
    }

    // Template Directory
    private function set_template_directory():array
    {
        global $template;
        $template = ROOTPATH.'/'.trim($template, '/');
        $dir['dir'] = "{$template}/dir/";
        $dir['compile'] = "{$template}/compile/";
        $dir['config'] = "{$template}/config/";
        $dir['cache'] = "{$template}/cache/";
        // Create Directories if Not Exist
        if(!file_exists($template)){
            mkdir($template);
            file_put_contents("{$template}/.htaccess", "### Deny Browsing This Directory\ndeny from all");
        }
        foreach($dir as $path){
            if(!file_exists($path)){
                mkdir($path);
            }
        }
        return $dir;
    }
}