<?php

class Autoloader
{
    public static function register($classname) {
        include __DIR__ . "/{$classname}.php";
    }
}

spl_autoload_register([Autoloader::class, 'register']);