<?php


class Facade
{
    protected static $container = 'person';

    public static function __callStatic($name, $arguments)
    {
        $person = ServiceContainer::make(self::$container);
        return $person->$name(...$arguments);
    }

    public function __set($name, $value)
    {
        
    }

    public function __get($name)
    {
        
    }

    public function __toString()
    {
        return 'Facade';
    }
}



