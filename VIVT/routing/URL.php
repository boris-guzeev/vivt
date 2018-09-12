<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 05.08.2018
 * Time: 14:24
 * Этот класс должен сопоставлять ЧПУ Ссылки
 * Предположительно как Registry
 */

namespace routing;

class URL
{
    private static $url;

    public static function instance()
    {
        if (empty(self::$url))
            self::$url = new self;
        return self::$url;
    }

    private function __construct()
    {
    }
}