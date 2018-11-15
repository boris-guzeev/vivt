<?php
/**
 * Created by PhpStorm.
 * User: Boris Guzeev
 * Date: 15.11.2018
 * Time: 14:04
 */

namespace domain;

/**
 * Class Mapper
 * @package domain
 * @property \PDO $pdo
 */
class Mapper implements CRUD
{
    private $pdo;

    function __construct()
    {
        $this->pdo = \VIVT::$db->getPDO();

    }

    /**
     * @param DomainObject $object
     * @return int|null В случае успешного добавления возвращает ID добавленного объекта, а в случае ошибки Null
     */
    public function insert(DomainObject $object)
    {
        $allProperties = get_object_vars($object);

        $columnsArray = [];
        $valuesArray = [];
        foreach ($allProperties as $key => $value) {
            if (empty($value)) continue;
            $valuesArray[] = $value;
            $columnsArray[] = $key;
        }

        $values = implode(', ', $valuesArray);
        $columns = implode(', ', $columnsArray);
        $tableName = $object->tableName();

        $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }

        return $this->pdo->lastInsertId();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function update(DomainObject $object)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}