<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 25.08.2018
 * Time: 22:11
 */

namespace routing;


use base\BaseView;

class Router
{

    public static function execute()
    {
        // убираем слэши вначале и в конце
        $currentRequest = preg_replace('/^\/+/', '', $_SERVER['REQUEST_URI']);
        $currentRequest = preg_replace('/\/+$/', '', $currentRequest);

        // проверямем соответствует ли текущий запрос какому-либо правилу
        if ($route = Matcher::match($currentRequest))
        {
            self::dispatch($route);
        }
        // проверяем есть ли в запросе переменная, которая отвечает за маршрут
        elseif (!empty($_REQUEST['route']))
        {
            self::dispatch($_REQUEST['route']);
        }
        // если ничего нет то выкидываем страницу 404
        else
        {
            ( new BaseView('page/404') );
        }
    }

    /**
     * Запускает нужное действеие
     * @param $route Строка маршрута в формате контроллер/действие
     */
    private static function dispatch($route)
    {
        // Определяем Контроллер
        $routeArray = explode('/', $route);
        $controllerName = $routeArray[0] . 'Controller';
        $actionName = $routeArray[1] . 'Action';

        // если класс Контроллера существует и в нем есть такое действие, то запускаем его
        if (class_exists($controllerName)) {
            $controller = new $controllerName;
            if (method_exists($controller, $actionName)) {
                //$args = array_shift($_REQUEST);
                //print_r($args);
                call_user_func([$controller, $actionName]);
            } else {
                (new BaseView('page/404'));
            }
        } else {
            (new BaseView('page/404'));
        }
    }
}