<?php
// PSR-4
namespace A\B;

use B\Human;
use Info;

define('AJYAL', true);
const LARAVEL = 'Laravel A';

function hello() {
    echo 'Hello A';
}

class Person implements Human
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
        self::$country = $country;
    }

    public function name()
    {
        return $this->name;
    }

    public function age()
    {
        return $this->age;
    }
}
