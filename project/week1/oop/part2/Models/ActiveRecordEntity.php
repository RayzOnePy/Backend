<?php

namespace Models;

use Services\Db;

abstract class ActiveRecordEntity
{
    protected int $id;

    public function getId() : int
    {
        return $this->id;
    }

    public function __set($name, $value) : void
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public static function getById(int $id) 
    {
        $db = new Db();
        $entities = $db->query(
            'SELECT * FROM ' . static::getTableName() . ' WHERE id=:id;',
            [':id' => $id],
            static::class,
        );
        return $entities ? $entities[0] : null;
    }

    public static function findAll() : array
    {
        $db = new Db();
        return $db->query('select * from ' . static::getTableName() . ';', [], static::class);
    }

    abstract protected static function getTableName() : string;
}