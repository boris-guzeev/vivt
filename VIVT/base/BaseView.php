<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 05.08.2018
 * Time: 11:21
 * Класс который будет генерировать Представления
 * Вероято можно было и без него но так помоему аккуратнее
 */
namespace base;

class BaseView
{
    // о умолчанию адрес вьюх
    private $viewDir = 'frontend/views';
    public $layout;

    public function __construct($view, $layout = 'main', $variables = null)
    {
        $this->layout = $layout;
        // подключим Вьюху
        $viewURL = $_SERVER["DOCUMENT_ROOT"] . '/' . $this->viewDir . '/' . $view . '.php';
        ob_start();
        require_once ($viewURL);
        $content = ob_get_clean();

        // подключаем Лэйаут
        require_once ($_SERVER["DOCUMENT_ROOT"] . '/' . 'frontend' . '/' . 'layouts' . '/' . $this->layout . '.php');
    }
}