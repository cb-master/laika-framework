<?php
/**
 * Project: Laika MVC Framework
 * Author Name: Showket Ahmed
 * Author Email: riyadhtayf@gmail.com
 */

// Namespace
namespace CBM\App\Factory;

// Forbidden Access
defined('ROOTPATH') || http_response_code(403).die('403 Forbidden Access!');

use CBM\Core\Config\Config;
use CBM\Model\Model;

class Factory
{
    // Table Name
    private static string $table;

    // Set Table For Create Data
    /**
     * @param string $table  - Required Arguments as Table Name.
     */
    public static function table(string $table):object
    {
        self::$table = $table;
        return new Static;
    }

    // Create UUID
    public static function uuid():string
    {
        return Model::table(self::$table)->uuid();
    }

    // Single Factory Method
    /**
     * @param string $column  - Required Arguments for Database Column Name
     * @param string $value  - Required Arguments as Column Value
     * @param string $select  - Optional Arguments. Default is '*'
     */
    public function single(string $column, string $value, string $select = '*'):array|object
    {
        return Model::table(self::$table)->filter($column, '=', $value)->single($select);
    }

    // Get All Factory Method
    /**
     * @param array $where  - Optional Arguments. Default is []
     * @param string $select  - Optional Arguments. Default is '*'
     */
    public function get(array $where = [], string $select = '*'):array
    {
        return Model::table(self::$table)->where($where)->get($select);
    }

    // Get Filter Factory Method
    /**
     * @param array $where  - Optional Arguments. Default is []
     * @param bool $limit  - Optional Arguments. Default is []
     * @param string $select  - Optional Arguments. Default is '*'
     */
    public function filter(array $where = [], bool $limit = false, string $select = '*'):array
    {
        return $limit ? Model::table(self::$table)->where($where)->limit(Config::get('app', 'limit'))->get($select) : Model::table(self::$table)->where($where)->get($select);
    }

    // Create Factory Method
    /**
     * @param array $data  - Required Arguments To Insert Data in Table.
     */
    public function create(array $data):int
    {
        return Model::table(self::$table)->insert($data);
    }

    // Update Factory Method
    /**
     * @param string $column  - Required Arguments for Database Column Name
     * @param string $operator  - Required Arguments To Operate. Example '=' or '<' or '>' etc
     * @param string $value  - Required Arguments as Column Value
     * @param array $data  - Required Arguments Column Values to Update
     */
    public function update(string $column, string $operator, string $value, array $data):int
    {
        return Model::table(self::$table)->filter($column, $operator, $value)->update($data);
    }

    // Remove Factory Method
    /**
     * @param string $column  - Required Arguments for Database Column Name
     * @param string $operator  - Required Arguments To Operate. Example '=' or '<' or '>' etc
     * @param string $value  - Required Arguments as Column Value
     */
    public function pop(string $column, string $operator, string $value):int
    {
        return Model::table(self::$table)->filter($column, $operator, $value)->pop();
    }
}