<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Core\Convert\Convert;
use CBM\Core\Option\Option;
use CBM\Session\Session;
use CBM\Core\Filter\Filter;
use CBM\Core\Helper\Helper;
use CBM\Core\Uri\Uri;

// Dump Data & Die
function dd($data, bool $die = false):void
{
    echo '<pre style="background-color:#000;color:#fff;">';
    var_dump($data);
    echo '</pre>';
    $die ? die() : $die;
}

// Show Data & Die
function show($data, bool $die = false):void
{
    echo '<pre style="background-color:#000;color:#fff;">';
    print_r($data);
    echo '</pre>';
    $die ? die() : $die;
}

// To JSON
/**
 * @param mixed $property - Required Argument.
 * @param int $type - Default Value is JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT.
 */
function toJson(array $array, $type = JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT):string
{
    return Convert::toJson($array, $type);
}

// To Array
/**
 * @param mixed $property - Required Argument
 */
function toArray(mixed $property):array
{
    return Convert::toArray($property);
}

// To Object
/**
 * @param mixed $property - Required Argument
 */
function toObject(mixed $property):object
{
    return Convert::toObject($property);
}

// Convert To Float Number
/**
 * @param int|string|float|null $number - Required Argument
 * @param int|string $decimal - Default is 2
 * @param string $thousands_separator - Default is Blank String ''
 */
function toDecinal(int|string|float|null $number, int|string $decimal = 2, string $thousands_separator = ''):string
{
    return Convert::toDecinal($number, $decimal, $thousands_separator);
}

// Convert to Price
/**
 * @param int|string|float|null $price - Default is null
 * @param int|string $decimal - Default is 2
 * @return string
 */
function toPrice(string|int|float $price = null, int $decimal = 2):string
{
    $price = toDecinal($price, $decimal);
    return Option::get('currencypfx') . $price;
}

// Local Date
/**
 * @param string|null $date - Default is null
 */
function localDateTime(?string $datetime)
{
    return $datetime ? date('Y-m-d\TH:i:s', strtotime($datetime)) : '0000-00-00T00:00:00';
}

// Get Slug
/**
 * @param int $index - Default is 0
 */
function slug(int $index):string
{
    return Uri::slug($index);
}

// Redirect
/**
 * @param string $slug - Required Argument
 * @param int $response - Default is 302
 */
function redirect(string $slug, int $response = 302):void
{
    Helper::redirect($slug, $response);
}

// Location
/**
 * @param string $slug - Required Argument
 */
function location(string $slug):string
{
    return Helper::location($slug);
}

// Same Url
/**
 * @param string $slug - Required Argument
 */
function sameUri():string
{
    $uri = Uri::app_uri();
    $slugs = Uri::slugs();
    foreach($slugs as $slug){
        $uri .= "/{$slug}";
    }
    return $uri;
}

// Check Staff Has Access
/**
 * @param string $access - Required Argument
 * @param string $for - Required Argument. Default is 'staff'
 */
function staffHasAccess(string $access):bool
{
    $accessList = unserialize(Session::get('access', ADMIN));
    return (isset($accessList[$access]) && $accessList[$access]) ? true : false;
}

// Add Filter
function add_filter(string $filter, callable $callback):void
{
    Filter::add_filter($filter, $callback);
}

// Apply Filter
function do_filter(string $filter, callable $callback):mixed
{
    return Filter::do_filter($filter, $callback);
}

// Add Action
function add_action(string $action, mixed ...$args):void
{
    Filter::add_action($action, ...$args);
}

// Apply Action
function do_action(string $action, mixed ...$args):mixed
{
    return Filter::do_action($action, ...$args);
}

