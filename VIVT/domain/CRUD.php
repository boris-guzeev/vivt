<?php
/**
 * Created by PhpStorm.
 * User: Boris Guzeev
 * Date: 15.11.2018
 * Time: 14:34
 */
namespace domain;

use \domain\DomainObject;

interface CRUD {
    // CREATE
    public function insert(DomainObject $object);

    // READ
    public function find($id);
    public function findAll();

    // UPDATE
    public function update(DomainObject $object);

    // DELETE
    public function delete($id);
}