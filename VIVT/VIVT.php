<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 01.08.2018
 * Time: 18:32
 */
use \routing\URL;
use \routing\Router;
use \base\Database;
use \routing\Matcher;

class VIVT
{
    public static $db;
    public static $url;

    public static function init()
    {
        self::setupFolders();
        self::setupRouting();
        self::setupObjects();
    }

    private static function setupFolders()
    {
        // подключим автолоадер Композера
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/' . 'vendor' . '/' . 'autoload.php');

        // укажем директории для подключения
        $dirs = [
            'vivt/base',
            'vivt/routing',
            'frontend/controllers',
            'frontend/models',
            'frontend/views'
        ];

        // подключим файлы класов приложения
        foreach ($dirs as $dir) {
            $pattern = $_SERVER['DOCUMENT_ROOT'] . '/' . $dir . '/*.php';
            foreach (glob( $pattern ) as $file) {
                include $file;
            }
        }
    }

    private static function setupRouting()
    {
        //Добавляем правила Роутинга
        Matcher::add('', 'page/index');
        Matcher::add('dostavka', 'page/delivery');
        //Matcher::add(':str/:str/:num', '<controller>/<action>&:num');

        // Запускаем роутинг
        Router::execute();
    }

    private static function setupObjects()
    {
        // сохраняем объект для работы с БД
        self::$db = Database::instance();
        // сохраняем объект для работы с URL
        self::$url = URL::instance();
    }
}