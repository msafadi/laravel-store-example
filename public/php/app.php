<?php
namespace A;

use A\B\Person;
use Facade;
use ServiceContainer;

use function A\B\hello;

include __DIR__ . '/autoload.php';


$person = new Person;
$person->name = 'Mohammed';
$person->setAge(50);

ServiceContainer::bind('person', $person);

echo Facade::name('Mohammed', 'Basel');
echo Facade::age();

exit;


//use Person;


$person = new \A\B\Person;
$person2 = new \B\Person;

$person->name = 'Mohammed';
$person2->name = 'Ahmed';

if ($person2 instanceof \B\Human) {
    echo 'YESS!';
}

$person->setAge(10);

$person::$country = 'Palestine';
$person2::$country = 'Jordan';

var_dump($person, $person2);

echo B\Person::$country;
echo $person::MALE;
