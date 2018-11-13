<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.11.2018
 * Time: 23:56
 */

namespace domain;


abstract class DomainObject
{
    public $id;

    function __construct($id = null)
    {
        $this->id = intval($id);
    }

    function __set($name, $value)
    {
        if ( isset($this->$name) ) {
            $this->$name = $value;
        }
        else {
            throw new \Exception("Свойства $name не существует!");
        }
    }

    function __get($name)
    {
        if ( isset($this->$name) ) {
            return $this->$name;
        }
        else {
            throw new \Exception("Свойства $name не существует!");
        }
    }
}