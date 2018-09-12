<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 05.08.2018
 * Time: 9:58
 */
use base\BaseController;
use base\View;


class PageController extends BaseController
{
    // вьюха домашней страницы
    public function indexAction()
    {
        // генерируем вьювку
       $this->view('index');
    }

    public function aboutAction()
    {
        $this->view('about');
    }

    public function deliveryAction()
    {
        $this->view('delivery');
    }

    public function studentsAction()
    {
        $this->view('students');
    }

    public function testAction()
    {

    }

    protected function before() {

    }
}