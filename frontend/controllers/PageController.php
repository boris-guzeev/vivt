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

    public function websocket()
    {
        $socket = stream_socket_server("tcp://127.0.0.0:8000", $errno, $errstr);

        if (!$socket) {
            die("$errstr ($errno)\n");
        }

        while ($connect = stream_socket_accept($socket, -1)) {
            fwrite($connect, "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nConnection: close\r\n\r\nПривет");
            fclose($connect);
        }

        fclose($socket);
    }

    // вьюха домашней страницы
    public function indexCommand()
    {
        // генерируем вьювку
       $this->view('index');
    }

    public function aboutCommand()
    {
        $this->view('about');
    }

    public function deliveryCommand()
    {
        $this->view('delivery');
    }
    public function studentsCommand()
    {
        $this->view('students');
    }

    protected function before() {

    }
}