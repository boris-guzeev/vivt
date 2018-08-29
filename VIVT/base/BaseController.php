<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 05.08.2018
 * Time: 10:34
 * Базовый контроллер от которого наследуются все остальные
 * в будущем потребуются функции перед и после запроса, наприер для идентификации пользователя
 */
namespace base;

class BaseController
{
    protected $layout = 'main';

    public function __construct()
    {
        $this->before();
    }

    protected function view ($page, Array $variables = []) {
        // если указана страница вьюхи без папки, то по умолчанию папка где лежат вьюхи соответствует названию Контроллера
        if( sizeof(explode('/', $page)) == 1 ) {
            $page = strtolower( str_replace('Controller', '', get_class($this)) ) . '/' .$page;
        }
        ( new BaseView($page, $this->layout, $variables) );
    }

    /**
     * Срабатывает перед командой в контроллере
     */
    protected function before() {

    }

    protected function after() {

    }
}