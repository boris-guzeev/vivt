<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 01.08.2018
 * Time: 18:32
 */
use base\URL;

class VIVT
{
    public static $db;
    public static $url;


    public static function init()
    {
        self::build();
        self::route();
    }

    public static function build()
    {
        // подключим автолоадер Композера
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/' . 'vendor' . '/' . 'autoload.php');

        // укажем директории для подключения
        $dirs = [
            'vivt/base',
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

        // сохраняем объект для работы с БД
        self::$db = \base\Database::instance();
        // сохраняем объект для работы с URL
        self::$url = \base\URL::instance();
    }

    /**
     * Запускаем определенный Контроллер и Экшен согласно запросу
     */
    public static function route()
    {
        //Создадим специальный класс для разбора ЧПУ
        //URL::setURL('/*/', 'view/index');

        if (!empty($_REQUEST['route'])) {
            // Определяем Контроллер
            $request = explode('/', $_REQUEST['route']);
            $controllerName = $request[0] . 'Controller';
            $commandName = $request[1] . 'Command';

            // если есть аргументы принимаем
            // второй и полледующие параметры будем считать аргументами
            array_shift($_REQUEST);

            // здесь будет обработка аргументов. экранирование и всё такое
            $args = $_REQUEST;

            // вообще нужно роутенигу посвятить отдельный класс
            // обязательно это сделаем
            // Вызываем Контроллер и метод согласно запросу
            // передадим Лэйаут ...
            $controller = new $controllerName('index');
            // если метода не существует то запускаем дефолтный метод index
            if (!method_exists($controller, $commandName)) {
                //call_user_method_array ('index', $controller, $args); // шторм говорит мол деприкейтед надо разобаться
                call_user_func([$controller, 'indexCommand'], $args);

            } else {
                //если всё норм то дельше передаём всё конкретному Контроллеру
                //call_user_method_array ($actionName, $controller, $args);
                call_user_func([$controller, $commandName], $args);

            }

        } else {
            // если Урл не по Роутингу то Разгребаем ЧПУ
            URL::checkURL();
            //Это на будущее
            (new \base\BaseView('page/404'));
            //throw new Exception('Ошибка роутинга!');
        }

    }
}