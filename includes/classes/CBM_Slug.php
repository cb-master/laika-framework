<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

 use CBM\Core\Uri\Uri;

class Slug
{
    public static function __callStatic($name, $args):string
    {
        $query = "";
        if($args){
            foreach($args as $arg){
                if(is_string($arg)){
                    $query .= "/{$arg}";
                }elseif(is_array($arg)){
                    $query .= "?";
                    foreach($arg as $key=>$val){
                        $query .= "{$key}={$val}";
                    }
                }
            }
        }
        if(Uri::slug(0) == ADMIN){
            return ADMIN."/{$name}{$query}";
        }elseif(Uri::slug(0) == PANEL){
            return PANEL."/{$name}{$query}";
        }
        return "{$name}{$query}";
    }
}