<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 05.08.2018
 * Time: 14:24
 * Этот класс должен сопоставлять ЧПУ Ссылки
 * Предположительно как Registry
 */

namespace base;

class URL
{
    private static $rules = [];
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

    // ассоциируем ЧПУ УРЛ с его Роутингом
    public static function setURL($pattern, $url)
    {
        self::$rules[] = [
            $pattern => $url
        ];
    }

    /**
     * Проверим УРЛ и если есть такое правило то перенапривим по Роутингу
     * здесь нужно деделываьть
     */
    public static function checkURL()
    {
        foreach (self::$rules as $rule) {
            $uri = $_SERVER['REQUEST_URI'];
            $uri = str_replace('/', '', $uri);

            $rule = key($rule);

            $ok = preg_match( $rule, $uri);
        }
    }
}