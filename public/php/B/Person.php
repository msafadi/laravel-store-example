<?php

namespace B;

use Info;

use A\B\Person as PersonA;

// define('AJYAL', true);
const LARAVEL = 'Laravel B';

function hello() {
    echo 'Hello B';
}

class Person extends PersonA
{
    use Info;

    const MALE = 'm';
    const FEMALE = 'f';

    public $name;
    protected $gender;
    private $age;

    public static $country;

    public function __construct()
    {
        echo __CLASS__;
    }


    public static function setCountry($country)
    {
        parent::setCountry($country);
        static::$country = $country;
    }
}