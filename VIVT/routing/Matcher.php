<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 29.08.2018
 * Time: 20:42
 */

namespace routing;


class Matcher
{
    //
    private static $rules = [];

    private static $patterns = [
        'num' => '[0-9]+',
        'str' => '[a-ZA-Z]'
    ];

    public static function add($key, $rule)
    {
        self::$rules[$key] = $rule;
    }


    public static function match($key)
    {
        // если правило существует то разберем его
        if (array_key_exists($key, self::$rules)) {
            return $rule = self::$rules[$key];
        }
        else return null;

    }

    private static function parseRule()
    {

    }
}