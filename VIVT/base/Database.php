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
    private static $_instance;

    private function __construct()
    {
        //подключение бд
        $user = 'root';
        $pass = '';
        $this->pdo = new \PDO('mysql:host=localhost;dbname=shop;charset=utf8', $user, $pass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    }

    public static function instance()
    {
        if (empty(self::$_instance))
            self::$_instance = new self;

        return self::$_instance;
    }

    /**
     * Возвращает объект PDO
     * @return \PDO
     */
    public function getPDO()
    {
        return $this->pdo;
    }

    private function __clone() {}
}