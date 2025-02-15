<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Core\Filter\Filter;
use CBM\Core\Option\Option;
use CBM\Core\Helper\Helper;
use CBM\Session\Session;

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

// Convert To Float Number
/**
 * @param int|string|float|null $number - Required Argument
 * @param int|string $decimal - Default is 2
 */
function to_decinal(int|string|float|null $number, int $decimal = 2):string
{
    $number = (float) $number;
    $thousands_separator = Option::thousands_separator();
    $decimal_seperator = Option::decimal_separator();
    return number_format($number, $decimal, $decimal_seperator, $thousands_separator);
}

// Convert to Price
/**
 * @param int|string|float|null $price - Default is null
 * @param int|string $decimal - Default is 2
 * @return string
 */
function to_price(string|int|float $price = null, int $decimal = 2):string
{
    $price = to_decinal($price, $decimal);
    return Option::get('currencypfx') . $price;
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

// Check Staff Has Access
/**
 * @param string $access - Required Argument
 * @param string $for - Required Argument. Default is 'staff'
 */
function access(string $access, string $for):bool
{
    $accessList = json_decode(Session::get('access_list', $for));
    return $accessList->$access ?? $accessList[$access] ?? false;
}

// Add Filter
function add_filter(string $filter, callable $callback):void
{
    Filter::add_filter($filter, $callback);
}

// Add Filter
function do_filter(string $filter, mixed ...$args):mixed
{
    return Filter::do_filter($filter, ...$args);
}

// Add Filter
function add_action(string $filter, callable $callback):void
{
    Filter::add_action($filter, $callback);
}

// Add Filter
function do_action(string $filter, mixed ...$args):mixed
{
    return Filter::do_action($filter, ...$args);
}