<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.08.2018
 * Time: 1:00
 * Объект данного класса используется для базовых методов работы с БД
 */

namespace base;


class Database
{
    private $pdo;
    private static $db;

    private function __construct()
    {
        //подключение бд
        $user = 'root';
        $pass = '';
        $this->pdo = new \PDO('mysql:host=localhost;dbname=learning', $user, $pass);
    }

    public static function instance()
    {
        if (empty(self::$db))
            self::$db = new self;

        return self::$db;
    }

    public function getPDO ()
    {
        return $this->pdo;
    }
}